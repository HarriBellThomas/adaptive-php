import React from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import TextSizeChanger from './TextSizeChanger';
import MouseControl from './MouseControl';
import ImageContainer from './ImageContainer';
import ParagraphControl from './ParagraphControl';
import ColorBlindnessControl from './ColorBlindnessControl';
import StyleInformationControl from './StyleInformationControl';
import {Tooltip} from 'react-tippy';
import Validation from './Validation'

import 'react-tippy/dist/tippy.css';
import '../../sass/tabs.scss';

export default class App extends React.Component {
  constructor(props) {
    super(props);

    this.moduleOrder = ['linkHighlighter', 'clickDelay',
                        'colorManipulations', 'imageColorShifter', 'paragraphReader'];
    this.moduleIndex = {'linkHighlighter': 0, 'clickDelay': 1,
                        'colorManipulations': 2, 'imageColorShifter': 3,
                        'paragraphReader': 4};
    this.validator = new Validation();

    this.state = {
      id: '',
      title: '',
      tags: [],
      saved: false,
      hasSaved: false,
      defaultStyle: true,
      modules: [
        {
          module: 'linkHighlighter',
          properties: {
            size: 18,
            bgColor: '0xFFFFFF',
            textColor: '0x000000',
            highlightOn: false,
          }
        },

        {
          module: 'clickDelay',
          properties: {
            delay: 0.4,
            doubleClick: false,
          }
        },

        {
          module: 'colorManipulations',
          properties: {
            saturationFactor: 1,
            brightnessFactor: 0,
            contrastFactor: 1,
          }
        },

        {
          module: 'imageColorShifter',
          properties: {
            identifier: 'None'
          }
        },

        {
          module: 'paragraphReader',
          properties: {
            chosenKey: 'SHIFT',
            reduceTransparency: 0.5,
            size: 48,
            defaultRate: 1,
          }
        }
      ]
    }


    this.saveStyle = this.saveStyle.bind(this);
    this.updateNthModule = this.updateNthModule.bind(this);
    this.styleInformationControlOnChange = this.styleInformationControlOnChange.bind(this);

  }

  componentDidMount() {

  }

  updateNthModule(n, values, callback) {
    // Should have used Redux....
    this.setState(prevState =>  {
      var newModuleProperties = Object.assign({...prevState.modules[n].properties}, values);
      var newModules = {modules: Object.assign([...prevState.modules], {[n]: {module: this.moduleOrder[n], properties:newModuleProperties}})};
      return {...newModules, saved: false};
    }, callback);

  }

  saveStyle() {
    const validated = this.validator.validate(this.state);
    if(!validated.valid) {
      // TODO: Improve error messages
      alert('Cannot save: ' + validated.errors);
      return;
    }
    console.log(JSON.stringify(this.state));
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
     </TabList>

    <TabPanel>
      <StyleInformationControl values={{title: this.state.title,
                                        tags: this.state.tags,
                                        saved: this.state.saved,
                                        defaultStyle: this.state.defaultStyle}}
                               onChange={this.styleInformationControlOnChange}
                               onBlur={this.saveStyle}/>
    </TabPanel>
   <TabPanel>
     <TextSizeChanger text='An example link'
                      values={this.state.modules[this.moduleIndex['linkHighlighter']].properties}
                      onChange={(values, callback) => this.updateNthModule(this.moduleIndex['linkHighlighter'], values, callback)}
                      onBlur={this.saveStyle}/>
   </TabPanel>
   <TabPanel>
     <MouseControl values={this.state.modules[this.moduleIndex['clickDelay']].properties}
                   onChange={(values) => this.updateNthModule(this.moduleIndex['clickDelay'], values)}
                   onBlur={this.saveStyle}/>
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
                         values={this.state.modules[this.moduleIndex['colorManipulations']].properties}
                         onChange={(values, callback) => this.updateNthModule(this.moduleIndex['colorManipulations'], values, callback)}
                         onBlur={this.saveStyle}/>
       </TabPanel>
       <TabPanel>
         <ColorBlindnessControl imageurl='/images/flowers.jpg'
                                width={500}
                                height={500}
                                values={this.state.modules[this.moduleIndex['imageColorShifter']].properties}
                                onChange={(values, callback) => this.updateNthModule(this.moduleIndex['imageColorShifter'], values, callback)}
                                onBlur={this.saveStyle}/>
       </TabPanel>
      </Tabs>
   </TabPanel>
   <TabPanel>
     <ParagraphControl values={this.state.modules[this.moduleIndex['paragraphReader']].properties}
                       onChange={(values, callback) => this.updateNthModule(this.moduleIndex['paragraphReader'], values, callback)}
                       onBlur={this.saveStyle}
                       speed={1}/>
   </TabPanel>
  </Tabs>
  );
  }
}
