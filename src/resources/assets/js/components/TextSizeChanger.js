import React from 'react';
import ReactDOM from 'react-dom';
import { CompactPicker } from 'react-color';
import ToggleButton from 'react-toggle-button';
import ValueInput from './ValueInput';

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
    this.props.onChange({textColor: hex});
  };

  handleChangeCompleteHighlight({hex}) {
    this.props.onChange({bgColor: hex})
  };

  handleToggle (value) {
    this.props.onChange({highlightOn: !value});
  };

  render() {
    return (
      <div className='text-size-changer'>
        <div className='row'>
          <div className='col-md-4'>
            <div className='control-panel'>
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

            <p> Text color: </p>
            <CompactPicker color={this.props.values.textColor} onChangeComplete={ this.handleChangeCompleteText }  />

            <p>Change background?</p>
            <div className='center-wrapper'>
              <div className='toggle-wrapper'>
              <ToggleButton
                value={ this.props.values.highlight }
                onToggle={this.handleToggle} />
            </div></div>

          <div style={{display: this.props.values.highlight ? 'inline' : 'none',}}>
              <p>Background color: </p>
              <CompactPicker color={this.props.values.bgColor} onChangeComplete={ this.handleChangeCompleteHighlight }  />
            </div>
          </div></div></div>

        <div className='col-md-8'>
          <div className='text-container'>
            <a style={{fontSize: this.props.values.size,
                       color: this.props.values.textColor,
                       backgroundColor: this.props.values.highlight ? this.props.values.bgColor : '',
                     }}>
            {this.props.text}
          </a>
        </div>
      </div></div>
    </div>
    );
  }
}
