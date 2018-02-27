import IncreaseButton from './IncreaseButton';
import DecreaseButton from './DecreaseButton';
import React from 'react';
import ReactDOM from 'react-dom';
import {Tooltip} from 'react-tippy';

export default class ValueInput extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      valueString: String(props.defaultValue),
    };

    this.increaseHandler = this.increaseHandler.bind(this);
    this.decreaseHandler = this.decreaseHandler.bind(this);
    this.updateValue = this.updateValue.bind(this);
  }

  updateValue(val) {
    if (val === '') {
      this.setState(() => ({valueString: ''}));
    } else if (val === '-') {
      this.setState(() => ({valueString: '-'}));
    } else if (!isNaN(val)) {
      this.setState(() => ({valueString: val}),
                    () => this.props.updateFunction(parseFloat(val)));
    }
  }

  increaseHandler() {
    this.setState((prevState) => ({valueString: String(Math.round((parseFloat(prevState.valueString) + this.props.inc) * 10) / 10)}),
                  () => this.props.updateFunction(parseFloat(this.state.valueString)));
  }

  decreaseHandler() {
    this.setState((prevState) => ({valueString: String(Math.round((parseFloat(prevState.valueString) - this.props.inc) * 10) / 10)}),
                  () => this.props.updateFunction(parseFloat(this.state.valueString)));
  }

  render() {
    return (
      <Tooltip title={this.props.tip}>
        <div className='value-input'>
          <DecreaseButton onClick={this.decreaseHandler} onBlur={this.props.onBlur}/>
          {this.props.description}
          <input value={this.state.valueString}
                 onChange={(evt) => this.updateValue(evt.target.value)}
                 onBlur = {this.props.onBlur}/>
               {' ' + this.props.unit}
          <IncreaseButton onClick={this.increaseHandler} onBlur={this.props.onBlur} />
        </div>
    </Tooltip>
    );
  }

}
