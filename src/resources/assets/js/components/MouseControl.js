import React from 'react';
import TimerChecker from './TimerChecker';
import ToggleButton from 'react-toggle-button';
import ValueInput from './ValueInput';

export default class MouseControl extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      disableDoubleClicks: false,
      time: 0.4
    }
    this.timeOnChange = this.timeOnChange.bind(this);
    this.handleToggle = this.handleToggle.bind(this);
  }

  timeOnChange(value) {
    this.setState({time: value});
  }

  handleToggle(value) {
    this.setState({disableDoubleClicks: !value});
  };

  render() {
    return(
      <div className='mouse-control'>
        <div className='row'>
          <div className='col-md-4'>
            <div className='control-panel'>
              <div className='center-wrapper'>
                <div className = 'button-bar'>
                <ValueInput defaultValue={this.state.time}
                            updateFunction={this.timeOnChange}
                            inc={0.1}
                            unit='s'
                            description='Time '
                            tip='Change the amount of time you have to hold down the mouse to click on a link.'/>
                </div></div>

            <p> Remove double clicks?</p>
            <div className='center-wrapper'>
            <div className='toggle-wrapper'>
            <ToggleButton value={this.state.disableDoubleClicks}
                          onToggle={this.handleToggle} />
            </div>
            </div>
            </div>
          </div>

          <div className='col-md-8'>
            <div className='center-wrapper'>
              <div className='toggle-wrapper'>
                <TimerChecker time={this.state.time} />
                </div></div>
          </div>

          </div>
        </div>
    );
  }
}
