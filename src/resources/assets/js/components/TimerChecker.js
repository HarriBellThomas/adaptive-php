import React from 'react';
import ReactDOM from 'react-dom';
import ValueInput from './ValueInput';
import ClickNHold from './ClickNHold';

export default class TimerChecker extends React.Component {
  render() {
    return (
      <div className='click-timer'>
          <ClickNHold time={this.props.time}
                      text='Click me!'
                      holdingStyle={{
                        WebkitAnimation: 'fill ' + this.props.time + 's forwards',
                        Animation: 'fill ' + this.props.time + 's forwards',}} />
      </div>

    );
  }
}
