import React from 'react';
import ValueInput from './ValueInput';
import ToggleButton from 'react-toggle-button';
import ParagraphReader from './ParagraphReader';

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
    this.props.onChange({reduceTransparency: value});
  }


  onClick(i) {
    alert('clicked on ' + i);
    const new_talking = [false, false, false];
    new_talking[i] = true;
    this.setState(() => ({talking: new_talking}));
  }

  render() {
    return (
      <div className='paragraph-control'>
        <div className='row'>
          <div className ='col-md-4'>
          <div className='control-panel'>
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
                            description='Focused text size'
                            tip='Change the text size of focused paragraphs'
                            onBlur={this.props.onBlur}/>

                </div>
            </div>

            <div className='button-bar'>
                <div className='center-wrapper'>
                  <ValueInput defaultValue={this.props.values.reduceTransparency}
                            updateFunction={this.handleTransparancyChange}
                            inc={0.1}
                            unit='%'
                            description='Transparency'
                            tip='Change how transparent the background paragraphs are.'
                            onBlur={this.props.onBlur}/>
                </div>
            </div>

          </div>
          </div>

          <div className='col-md-8'>
          <div className='text-container'>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[0]}
                             onClick={() => this.onClick(0)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
              This is an example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you not
                become distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                make other paragraphs more transparent.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[1]}
                             onClick={() => this.onClick(1)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
                This is an another example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you not
                  become distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                  make other paragraphs more transparent.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[2]}
                             onClick={() => this.onClick(2)}
                             opacity={this.props.values.reduceTransparency}
                             size={this.props.values.size}>
                  This is a third example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you not
                    become distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                    make other paragraphs more transparent.
            </ParagraphReader>
          </div>
      </div></div>
  </div>
    )
  }


}
