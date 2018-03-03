import React from 'react';
import ToggleButton from 'react-toggle-button';

export default class OnOff extends React.Component {
  render() {
    return (
      <div className='control-panel'>
        <p>{'Enable ' + this.props.name + '?'}</p>
        <div className='center-wrapper'><div className='toggle-wrapper'>
        <ToggleButton onToggle={this.props.onToggle}
                      value={this.props.value} />
        </div></div>
          <div style={this.props.value ? {} : {display: 'none'}}>
            {this.props.children}
          </div>
        </div>
    );
  }
}
