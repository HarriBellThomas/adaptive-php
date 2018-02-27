import React from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import TextSizeChanger from './TextSizeChanger';
import MouseControl from './MouseControl';
import ImageContainer from './ImageContainer';
import ParagraphControl from './ParagraphControl';
import ColorBlindnessControl from './ColorBlindnessControl';
import StyleInformationControl from './StyleInformationControl';
import {Tooltip} from 'react-tippy';

import 'react-tippy/dist/tippy.css';
import '../../sass/tabs.scss';

export default class App extends React.Component {
  constructor(props) {
    super(props);

    this.moduleOrder = ['linkHighlighter', 'clickDelay',
                        'colorManipulations', 'imageColorShifter'];
    this.moduleIndex = {'linkHighlighter': 0, 'clickDelay': 1,
                        'colorManipulations': 2, 'imageColorShifter': 3};


    this.state = {
      title: '',
      tags: [],
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
            delay: '',
            doubleClick: false,
          }
        },

        {
          module: 'colorManipulations',
          properties: {
            saturationFactor: '',
            brightnessFactor: '',
            contrastFactor: '',
          }
        },

        {
          module: 'imageColorShifter',
          properties: {
            identifier: ''
          }
        }
      ]
    }
  }

  updateNthModule(n, values) {
    // Should have used Redux....
    this.setState(prevState =>  {
      var newModuleProperties = Object.assign({...prevState.modules[n].properties}, values);
      var newModules = {modules: Object.assign([...prevState.modules], {[n]: {module: this.moduleOrder[n], properties:newModuleProperties}})};
      alert(JSON.stringify(newModules));
      return newModules;
    });

  }

  render() {
    return (
      <Tabs>
     <TabList>
       <Tab><Tooltip title='Set the name and tags on your style.'>Style Information</Tooltip></Tab>
       <Tab><Tooltip title='Change the apperance of links.'>Link Highlighting</Tooltip></Tab>
       <Tab><Tooltip title='Make the mouse easier to use by adding delays and removing double clicks.'>Mouse Control</Tooltip></Tab>
       <Tab><Tooltip title='Change the colours on webpages.'>Color Manipulations</Tooltip></Tab>
       <Tab><Tooltip title='Make the webpage focus on a single paragraph.'>Paragraph Highlighting</Tooltip></Tab>
     </TabList>

    <TabPanel>
      <StyleInformationControl />
    </TabPanel>
   <TabPanel>
     <TextSizeChanger text='An example link'
                      values={this.state.modules[this.moduleIndex['linkHighlighter']].properties}
                      onChange={(values) => this.updateNthModule(this.moduleIndex['linkHighlighter'], values)}/>
   </TabPanel>
   <TabPanel>
     <MouseControl />
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
                         height={500}/>
       </TabPanel>
       <TabPanel>
         <ColorBlindnessControl imageurl='/images/flowers.jpg'
                                width={500}
                                height={500}/>
       </TabPanel>
      </Tabs>
   </TabPanel>
   <TabPanel>
     <ParagraphControl />
   </TabPanel>
  </Tabs>
  );
  }
}
