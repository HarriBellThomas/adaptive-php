import React from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import TextSizeChanger from './TextSizeChanger';
import MouseControl from './MouseControl';
import ImageContainer from './ImageContainer';
import ParagraphControl from './ParagraphControl';
import ColorBlindnessControl from './ColorBlindnessControl';
import StyleInformationControl from './StyleInformationControl';
import {Tooltip} from 'react-tippy';
import Validation from './Validation';
import ExtraTools from './ExtraTools';
import 'react-tippy/dist/tippy.css';
import '../../sass/tabs.scss';

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.validator = new Validation();
    alert(Object.keys(this.props).length);

    const defaultState = [
      {
        module: 'linkHighlighter',
        properties: {
          enabled: false,
          size: 18,
          backgroundColor: '0xFFFFFF',
          textColor: '0x000000',
          highlightOn: false,
        }
      },

      {
        module: 'clickDelay',
        properties: {
          enabled: false,
          delay: 0.4,
          doubleClick: false,
        }
      },

      {
        module: 'colorManipulations',
        properties: {
          enabled: false,
          changeSaturation : {
            factor: 1,
          },
          changeBrightness: {
            factor: 0,
          },
          changeContrast: {
            factor: 1,
          }
        }
      },

      {
        module: 'imageColorShifter',
        properties: {
          enabled: false,
          identifier: 'None'
        }
      },

      {
        module: 'paragraphReader',
        properties: {
          enabled: false,
          chosenKey: 'SHIFT',
          reduceTransparency: 0.5,
          size: 48,
          defaultRate: 1,
        }
      },

      {
        module: 'visionTools',
        properties: {
          enabled: true,
        }
      },

      {
        module: 'darkMode',
        properties: {
          enabled: false,
        }
      },

      {
        module: 'speedBar',
        properties: {
          enabled: false,
          speed: 1,
        }
      },

      {
        module: 'showMouse',
        properties: {
          enabled: false,
          speed: 'fast',
        }
      },

      {
        module: 'typeWarning',
        properties: {
          enabled: false,
          type: 'flash',
        }
      },

      {
        module: 'magnifier',
        properties: {
          enabled: false,
          zoom: 2,
          size: 350,
        }
      },

      {
        module: 'passwordReveal',
        properties: {
          enabled: false,
          timeDelay: 3,
        }
      }
    ];



    if (Object.keys(this.props).length === 0) {  // On create page
      this.state = {
        id: '',
        title: '',
        tags: [],
        saved: false,
        hasSaved: false,
        defaultStyle: true,
        modules: [...defaultState]
      };
    } else { // On edit page

      // We have to re-add the disabled modules
      const moduleNames = defaultState.map(module => module.module);

      const propsCopy = {...this.props.props};
      alert(typeof propsCopy.defaultStyle);
      moduleNames.forEach(name => {
          if(!this._findModule(name, propsCopy.modules)) {
            propsCopy.modules.push(this._findModule(name, defaultState));
          }
        }
      )
      alert(JSON.stringify(propsCopy));
      this.state = propsCopy;
    }


    this.saveStyle = this.saveStyle.bind(this);
    this.updateModule = this.updateModule.bind(this);
    this.styleInformationControlOnChange = this.styleInformationControlOnChange.bind(this);
    this._changeModule = this._changeModule.bind(this);
    this.autoSave = this.autoSave.bind(this);
  }

  componentDidMount() {

  }

  _findModule(moduleName, moduleList) {
    for (var i = 0; i < moduleList.length; i++) {
      if (moduleList[i].module === moduleName) return moduleList[i];
    }
  }

  _changeModule(moduleName, moduleList, propName, propValue) {
    const module = this._findModule(moduleName, moduleList);
    module.properties[propName] = propValue;

    console.log('updated module:');
    console.log(JSON.stringify(module));
  }

  updateModule(moduleName, values, callback, action) {
    // Should have used Redux...

    if (action === 'TOGGLE_ENABLE') {
      this.setState(prevState => {
        const prevStateCopy = JSON.parse(JSON.stringify(prevState));
        prevStateCopy.saved = false;
        const module = this._findModule(moduleName, prevStateCopy.modules);
        module.properties.enabled = values.enabled;
        console.log(prevStateCopy);
        return prevStateCopy;
      }, callback);
    } else {
      this.setState(prevState =>  {
        const prevStateCopy = JSON.parse(JSON.stringify(prevState));
        prevStateCopy.saved = false;
        for (var key in values) {
          this._changeModule(moduleName, prevStateCopy.modules, key, values[key]);
        }
        return prevStateCopy;
      }, callback);
    }
  }

  autoSave() {
    this.saveStyle(true);
  }

  saveStyle(autoSave) {
    const validated = this.validator.validate(this.state);
    if(!validated.valid) {
      // TODO: Improve error messages
      if (!autoSave) alert('Cannot save: ' + validated.errors);
      else console.log(validated.errors);
      return;
    }
    return fetch('/style', {
      method: 'POST',
      body: JSON.stringify(this.state),
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      credentials: 'same-origin'})
      .then((response) => (response.json()))
      .then((json) => {
         console.log(JSON.stringify(json));
         this.setState({saved: true, hasSaved: true, id: json.id});
      })
      .catch((error) => alert(JSON.stringify(error.message)));
  }

  styleInformationControlOnChange(action, value) {
    // Basically redux reducer manually implemented
    switch(action) {
      case 'TOGGLE':
        this.updateModule(value.name, {'enabled': value.value}, null, 'TOGGLE_ENABLE');
        break;
      case 'UPDATE_TITLE':
        this.setState({title: value, saved: false});
        break;
      case 'UPDATE_TAGS':
        this.setState({tags: value, saved:false});
        break;
      case 'SAVE':
        this.saveStyle();
        break;
      case 'TOGGLE_DEFAULT':
        this.setState({defaultStyle: value, saved:false}, this.saveStyle);
        break;
      default:
        console.log('Unknown action');
    }
  }

  render() {
    return (
      <Tabs>
     <TabList>
       <Tab><Tooltip title='Set the name and tags on your style.'>Style Information</Tooltip></Tab>
       <Tab><Tooltip title='Change the apperance of links.'>Link Highlighting</Tooltip></Tab>
       <Tab><Tooltip title='Make the mouse easier to use by adding delays and removing double clicks.'>Mouse Control</Tooltip></Tab>
       <Tab><Tooltip title='Change the colours on webpages.'>Color Manipulations</Tooltip></Tab>
       <Tab><Tooltip title='Make the webpage focus on a single paragraph.'>Paragraph Reader</Tooltip></Tab>
       <Tab><Tooltip title='Some extra tools to adapt your browsing experience.'>Extra Tools</Tooltip></Tab>
     </TabList>

    <TabPanel>
      <StyleInformationControl values={{title: this.state.title,
                                        tags: this.state.tags,
                                        saved: this.state.saved,
                                        defaultStyle: this.state.defaultStyle,
                                        visionToolsEnabled: this._findModule('visionTools', this.state.modules).properties.enabled,
                                        darkModeEnabled: this._findModule('darkMode', this.state.modules).properties.enabled,}}
                               onChange={this.styleInformationControlOnChange}
                               onBlur={this.autoSave}/>
    </TabPanel>
   <TabPanel>
     <TextSizeChanger text='An example link'
                      values={this._findModule('linkHighlighter', this.state.modules).properties}
                      onChange={(values, callback, action) => this.updateModule('linkHighlighter', values, callback, action)}
                      onBlur={this.autoSave}/>
   </TabPanel>
   <TabPanel>
     <MouseControl values={this._findModule('clickDelay', this.state.modules).properties}
                   onChange={(values, callback) => this.updateModule('clickDelay', values)}
                   onBlur={this.autoSave}/>
   </TabPanel>
   <TabPanel>
     <Tabs forceRenderTabPanel>
       <TabList>
         <Tab>Color Filters</Tab>
         <Tab>Color Blindness Corrections</Tab>
       </TabList>
       <TabPanel>
         <ImageContainer imageurl='/images/froggy.jpg'
                         width={500}
                         height={500}
                         values={this._findModule('colorManipulations', this.state.modules).properties}
                         onChange={(values, callback, action) => this.updateModule('colorManipulations', values, callback, action)}
                         onBlur={this.autoSave}/>
       </TabPanel>
       <TabPanel>
         <ColorBlindnessControl imageurl='/images/flowers.jpg'
                                width={500}
                                height={500}
                                values={this._findModule('imageColorShifter', this.state.modules).properties}
                                onChange={(values, callback, action) => this.updateModule('imageColorShifter', values, callback, action)}
                                onBlur={this.autoSave}/>
       </TabPanel>
      </Tabs>
   </TabPanel>
   <TabPanel>
     <ParagraphControl values={this._findModule('paragraphReader', this.state.modules).properties}
                       onChange={(values, callback, action) => this.updateModule('paragraphReader', values, callback, action)}
                       onBlur={this.autoSave}
                       speed={1}/>
   </TabPanel>

   <TabPanel>
     <ExtraTools values={{speedBar: this._findModule('speedBar', this.state.modules).properties,
                          showMouse: this._findModule('showMouse', this.state.modules).properties,
                          typeWarning: this._findModule('typeWarning', this.state.modules).properties,
                          magnifier: this._findModule('magnifier', this.state.modules).properties,
                          passwordReveal: this._findModule('passwordReveal', this.state.modules).properties}}
                 onChange={this.updateModule} />
   </TabPanel>
  </Tabs>
  );
  }
}
