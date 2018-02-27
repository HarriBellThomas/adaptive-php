import React from 'react';
import ReactDOM from 'react-dom';

export default class DecreaseButton extends React.Component {
  render() {
    return (
    <button className="size-btn decrease"
            onClick={this.props.onClick}
            onBlur={this.props.onBlur}>
      -
    </button>
    );
  }
}
