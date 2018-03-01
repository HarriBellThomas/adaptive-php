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
    this.handleToggle = this.handleToggle.bind(this);
    this.handleSizeChange = this.handleSizeChange.bind(this);
    this.onClick = this.onClick.bind(this);
  }

  handleSpeedChange(value) {
    this.setState({talking: [false, false, false]}, () => this.props.onChange({defaultRate: value}));
    
  }

  handleSizeChange(value) {
    this.props.onChange({size: value});
  }

  handleToggle(value) {
    this.props.onChange({enabled: !value}, this.props.onBlur);
  };

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

            <p>Turn on paragraph focus mode?</p>
            <div className='center-wrapper'><div className='toggle-wrapper'>
            <ToggleButton value={this.props.values.enabled}
                          onToggle={this.handleToggle} />

            </div></div>

          <div className='button-bar'>
              <div className='center-wrapper'>
              <ValueInput defaultValue={this.props.values.defaultRate}
                          updateFunction={this.handleSpeedChange}
                          inc={0.1}
                          unit='x'
                          description='Reader Speed '
                          tip='Change the speed of the screen reader.'/>

              </div></div>

            <div className='button-bar' style={{display: this.props.values.enabled ? 'inline' : 'none',}}>
                <div className='center-wrapper'>
                <ValueInput defaultValue={this.props.values.size}
                            updateFunction={this.handleSizeChange}
                            inc={1}
                            unit='pt'
                            description='Focused paragraph size'
                            tip='Change the text size of focused paragraphs'
                            onBlur={this.props.onBlur}/>

                </div></div>
            </div>
          </div>

          <div className='col-md-8'>
          <div className='text-container'>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[0]}
                             onClick={() => this.onClick(0)}>
              This is an example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you not
                become distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                make other paragraphs more transparent.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[1]}
                             onClick={() => this.onClick(1)}>
                This is an another example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you not
                  become distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                  make other paragraphs more transparent.
            </ParagraphReader>
            <ParagraphReader speed={this.props.values.defaultRate}
                             talking={this.state.talking[2]}
                             onClick={() => this.onClick(2)}>
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
