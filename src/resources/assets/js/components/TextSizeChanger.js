import React from 'react';
import ReactDOM from 'react-dom';
import { CompactPicker } from 'react-color';
import ToggleButton from 'react-toggle-button';
import ValueInput from './ValueInput';
import ControlPanel from './ControlPanel';

export default class TextSizeChanger extends React.Component {
  constructor(props) {
    super(props);

    this.sizeChangeHandler = this.sizeChangeHandler.bind(this);
    this.handleChangeCompleteText = this.handleChangeCompleteText.bind(this);
    this.handleChangeCompleteHighlight = this.handleChangeCompleteHighlight.bind(this);
    this.handleToggle = this.handleToggle.bind(this);
  }

  sizeChangeHandler(value) {
    this.props.onChange({size: value});
  }

  handleChangeCompleteText({hex}) {
    this.props.onChange({textColour: hex}, this.props.onBlur);
  };

  handleChangeCompleteHighlight({hex}) {
    this.props.onChange({backgroundColour: hex}, this.props.onBlur);
  };

  handleToggle (value) {
    this.props.onChange({highlightOn: !value}, this.props.onBlur);
  };

  render() {
    return (
      <div className='text-size-changer'>
        <div className='row'>
          <div className='col-md-4'>
            <ControlPanel controlPanelName='Link highlighting'
                          value={this.props.values.enabled}
                          onChange={(value) => this.props.onChange(value, null, 'TOGGLE_ENABLE')}>
            <div className='center-wrapper'>
            <div className='button-bar'>
              <ValueInput defaultValue={this.props.values.size}
                          updateFunction={this.sizeChangeHandler}
                          inc={1}
                          unit='pt'
                          description='Size '
                          tip='Change the text size of links.'
                          onBlur={this.props.onBlur}/>
            </div>

            <div className='logic-block'>
              <p> Text color: </p>
              <CompactPicker color={this.props.values.textColour} onChangeComplete={ this.handleChangeCompleteText }  />
            </div>

            <div className='logic-block'>
              <p>Change background?</p>
              <div className='center-wrapper'>
                <div className='toggle-wrapper'>
                <ToggleButton
                  value={ this.props.values.highlightOn }
                  onToggle={this.handleToggle} />
              </div></div>
            </div>

          <div style={{display: this.props.values.highlightOn ? 'inline' : 'none',}}>
            <div className='logic-block'>
              <p>Background color: </p>
              <CompactPicker color={this.props.values.backgroundColour} onChangeComplete={ this.handleChangeCompleteHighlight }  />
            </div>
          </div>
          </div></ControlPanel></div>

        <div className='col-md-8'>
          <div className='text-container'>
            <a style={{fontSize: this.props.values.size,
                       color: this.props.values.textColour,
                       backgroundColor: this.props.values.highlightOn ? this.props.values.backgroundColour : '',
                     }}>
            {this.props.text}
          </a>
        </div>
      </div></div>
    </div>
    );
  }
}
