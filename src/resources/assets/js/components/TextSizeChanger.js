import React from 'react';
import ReactDOM from 'react-dom';
import { CompactPicker } from 'react-color';
import ToggleButton from 'react-toggle-button';
import ValueInput from './ValueInput';

export default class TextSizeChanger extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      size: 18,
      textColor: '0x00000',
      highlightColor: '0xFFFFFF',
      highlight: false,
    };
    this.sizeChangeHandler = this.sizeChangeHandler.bind(this);
    this.handleChangeCompleteText = this.handleChangeCompleteText.bind(this);
    this.handleChangeCompleteHighlight = this.handleChangeCompleteHighlight.bind(this);
    this.handleToggle = this.handleToggle.bind(this);
  }

  sizeChangeHandler(value) {
    this.setState(() => ({size: value}));
  }

  handleChangeCompleteText({hex}) {
    this.setState({textColor: hex});
  };

  handleChangeCompleteHighlight({hex}) {
    this.setState({highlightColor: hex})
  };

  handleToggle (value) {
    this.setState({highlight: !value});
  };

  render() {
    return (
      <div className='text-size-changer'>
        <div className='row'>
          <div className='col-md-4'>
            <div className='control-panel'>
            <div className='center-wrapper'>
            <div className='button-bar'>
              <ValueInput defaultValue={this.state.size}
                          updateFunction={this.sizeChangeHandler}
                          inc={1}
                          unit='pt'
                          description='Size '
                          tip='Change the text size of links.'/>
            </div>

            <p> Text color: </p>
            <CompactPicker color={this.state.textColor} onChangeComplete={ this.handleChangeCompleteText }  />

            <p>Change background?</p>
            <div className='center-wrapper'>
              <div className='toggle-wrapper'>
              <ToggleButton
                value={ this.state.highlight }
                onToggle={this.handleToggle} />
            </div></div>

            <div style={{display: this.state.highlight ? 'inline' : 'none',}}>
              <p>Background color: </p>
              <CompactPicker color={this.state.highlightColor} onChangeComplete={ this.handleChangeCompleteHighlight }  />
            </div>
          </div></div></div>

        <div className='col-md-8'>
          <div className='text-container'>
            <a style={{fontSize: this.state.size,
                     color: this.state.textColor,
                     backgroundColor: this.state.highlight ? this.state.highlightColor : '',
                     }}>
            {this.props.text}
          </a>
        </div>
      </div></div>
    </div>
    );
  }
}
