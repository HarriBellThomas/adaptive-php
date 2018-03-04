import React from 'react';
import TimerChecker from './TimerChecker';
import ToggleButton from 'react-toggle-button';
import ValueInput from './ValueInput';
import ControlPanel from './ControlPanel';

export default class MouseControl extends React.Component {
  constructor(props) {
    super(props);

    this.timeOnChange = this.timeOnChange.bind(this);
    this.handleToggle = this.handleToggle.bind(this);
  }

  timeOnChange(value) {
    this.props.onChange({delay: value});
  }

  handleToggle(value) {
    this.props.onChange({doubleClick: !value});
  };

  render() {
    return(
      <div className='mouse-control'>
        <div className='row'>
          <div className='col-md-4'>
            <ControlPanel controlPanelName='Click delay'
                          value={this.props.values.enabled}
                          onChange={(value) => this.props.onChange(value, null, 'TOGGLE_ENABLE')}>
              <div className='center-wrapper'>
                <div className = 'button-bar'>
                <ValueInput defaultValue={this.props.values.delay}
                            updateFunction={this.timeOnChange}
                            inc={0.1}
                            unit='s'
                            description='Time '
                            tip='Change the amount of time you have to hold down the mouse to click on a link.'
                            onBlur = {this.props.onBlur}/>
                </div></div>

              <div className='logic-block'>
                <p> Remove double clicks?</p>
                <div className='center-wrapper'>
                  <div className='toggle-wrapper'>
                      <ToggleButton value={this.props.values.doubleClick}
                              onToggle={this.handleToggle} />
                  </div>
                </div>
            </div>
          </ControlPanel>
          </div>

          <div className='col-md-8'>
            <div className='center-wrapper'>
              <div className='toggle-wrapper'>
                <TimerChecker time={this.props.values.delay} />
                </div></div>
          </div>

          </div>
        </div>
    );
  }
}
