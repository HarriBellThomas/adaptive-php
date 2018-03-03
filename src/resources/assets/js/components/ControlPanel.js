import React from 'react';
import ToggleButton from 'react-toggle-button';


export default class ControlPanel extends React.Component {
  constructor(props) {
    super(props);

    this.handleToggle = this.handleToggle.bind(this);
  }

  handleToggle(value) {
    this.props.onChange({enabled: !value});
  }

  render() {
    return(
      <div className='control-panel'>
        <p>{'Enable ' + this.props.controlPanelName + '?'}</p>
        <div className='center-wrapper'>
          <div className='toggle-wrapper'>
            <ToggleButton value={this.props.value}
                          onToggle={this.handleToggle} />
          </div>
        </div>
        <div style={this.props.value ? {} : {display: 'none'}}>
          {this.props.children}
        </div>
      </div>);
  }
}
