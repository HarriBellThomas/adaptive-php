import React from 'react';
import ValueInput from './ValueInput';
import ToggleButton from 'react-toggle-button';
import ParagraphReader from './ParagraphReader';
import ControlPanel from './ControlPanel';
import {RadioGroup, Radio} from 'react-radio-group';
import {Tooltip} from 'react-tippy';


export default class ParagraphControl extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      talking: [false, false, false]
    }

    this.handleSpeedChange = this.handleSpeedChange.bind(this);
    this.handleSizeChange = this.handleSizeChange.bind(this);
    this.handleTransparancyChange = this.handleTransparancyChange.bind(this);
    this.onClick = this.onClick.bind(this);
  }

  handleSpeedChange(value) {
    this.setState({talking: [false, false, false]}, () => this.props.onChange({defaultRate: value}));

  }

  handleSizeChange(value) {
    this.props.onChange({size: value});
  }

  handleTransparancyChange(value) {
    this.props.onChange({reduceTransparency: !value});
  }


  onClick(i) {
    return (value) => {
      window.speechSynthesis.cancel();
      const new_talking = [false, false, false];
      new_talking[i] = value;
      this.setState(() => ({talking: new_talking}));
    }
  }


  render() {
    console.log('value passed in ' + this.props.values.enabled);
    return (
      <div className='paragraph-control'>
        <div className='row'>
          <div className ='col-md-4'>
          <ControlPanel controlPanelName='Paragraph reader'
                        value={this.props.values.enabled}
                        onChange={(value) => this.props.onChange(value, null, 'TOGGLE_ENABLE')}>
          <div className='button-bar'>
              <div className='center-wrapper'>
              <ValueInput defaultValue={this.props.values.defaultRate}
                          updateFunction={this.handleSpeedChange}
                          inc={0.1}
                          unit='x'
                          description='Reader Speed '
                          tip='Change the speed of the screen reader.'/>

              </div>
          </div>

            <div className='button-bar'>
                <div className='center-wrapper'>
                <ValueInput defaultValue={this.props.values.size}
                            updateFunction={this.handleSizeChange}
                            inc={1}
                            unit='px'
                            description='Focus text size'
                            tip='Change the text size of focused paragraphs'
                            onBlur={this.props.onBlur}/>

                </div>
            </div>

            <div className='button-bar'>
                <div className='center-wrapper'>
                  <div className='logic-block'>
                    <p>Fade background?</p>
                    <div className='center-wrapper'><div className='toggle-wrapper'>
                      <ToggleButton value={this.props.values.reduceTransparency}
                                    onToggle={this.handleTransparancyChange}/>
                    </div></div>
                  </div>
                </div>
            </div>
          </ControlPanel>
          </div>


          <div className='col-md-8'>
          <div className='text-container'>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[0]}
                             onClick={this.onClick(0)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
              This is an example paragraph. By enabling paragraph highlighting, you can click on the paragraph
              and it will read it out to you, highlighting words as you go along. This can help you focus
              on a paragraph and not become distracted.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[1]}
                             onClick={this.onClick(1)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
               This is an another example paragraph. By enabling paragraph highlighting, you can click on the paragraph
               and it will read it out to you, highlighting words as you go along. This can help you focus
               on a paragraph and not become distracted.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[2]}
                             onClick={this.onClick(2)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
               This is a third example paragraph. By enabling paragraph highlighting, you can click on the paragraph
               and it will read it out to you, highlighting words as you go along. This can help you focus
               on a paragraph and not become distracted.
            </ParagraphReader>
          </div>
      </div></div>
  </div>
    )
  }


}
