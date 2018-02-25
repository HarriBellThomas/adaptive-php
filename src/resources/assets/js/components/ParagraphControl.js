import React from 'react';
import ValueInput from './ValueInput';
import ToggleButton from 'react-toggle-button';

export default class ParagraphControl extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      opacity: 0.5,
      size: 20,
      focusMode: false,
    }

    this.handleOpacityChange = this.handleOpacityChange.bind(this);
    this.handleToggle = this.handleToggle.bind(this);
    this.handleSizeChange = this.handleSizeChange.bind(this);
  }

  handleOpacityChange(value) {
    this.setState({opacity: value / 100});
  }

  handleSizeChange(value) {
    this.setState({size: value});
  }

  handleToggle(value) {
    this.setState({focusMode: !value});
  };

  render() {
    return (
      <div className='paragraph-control'>
        <div className='row'>
          <div className ='col-md-4'>
          <div className='control-panel'>

            <p>Turn on paragraph focus mode?</p>
            <div className='center-wrapper'><div className='toggle-wrapper'>
            <ToggleButton value={this.state.focusMode}
                          onToggle={this.handleToggle} />

            </div></div>

          <div className='button-bar' style={{display: this.state.focusMode? 'inline' : 'none',}}>
              <div className='center-wrapper'>
              <ValueInput defaultValue={this.state.opacity * 100}
                          updateFunction={this.handleOpacityChange}
                          inc={5}
                          unit='%'
                          description='Transparency'
                          tip='Change the transparency of unfocused paragraphs.'/>

              </div></div>

            <div className='button-bar' style={{display: this.state.focusMode ? 'inline' : 'none',}}>
                <div className='center-wrapper'>
                <ValueInput defaultValue={this.state.size}
                            updateFunction={this.handleSizeChange}
                            inc={1}
                            unit='pt'
                            description='Focused paragraph size'
                            tip='Change the text size of focused paragraphs'/>

                </div></div>
            </div>
          </div>

          <div className='col-md-8'>
          <div className='text-container'>
            <p style={this.state.focusMode ?
                      {opacity: this.state.opacity, fontSize:18} : {fontSize:18}}>
              This is an example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you stop from
                becoming distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                make other paragraphs more transparent.
            </p>
            <p style={this.state.focusMode ?
                      {fontSize: this.state.size} : {fontSize:18}}>
                This is an another example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you stop from
                  becoming distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                  make other paragraphs more transparent.
            </p>
            <p style={this.state.focusMode ?
                      {opacity: this.state.opacity, fontSize: 18} : {fontSize:18}}>
                  This is third example paragraph. By enabling paragraph highlighting, you can focus on specific paragraphs. This could help you stop from
                    becoming distracted by other content on the page and make reading easier. When focused on a paragraph, it will become bigger and
                    make other paragraphs more transparent.
            </p>
          </div>
      </div></div>
  </div>


    )
  }


}