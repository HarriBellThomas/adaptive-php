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
     <TextSizeChanger text='An example link' />
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
