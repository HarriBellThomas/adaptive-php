import React from 'react';
import ReactDOM from 'react-dom';

export default class IncreaseButton extends React.Component {
  render() {
    return (
      <button className="size-btn increase"
              onClick={this.props.onClick}
              onBlur={this.props.onBlur}>
        +
      </button>
    );
  }
}
