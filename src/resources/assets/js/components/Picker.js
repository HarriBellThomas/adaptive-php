import React from 'react';
import {RadioGroup, Radio} from 'react-radio-group';


export default class Picker extends React.Component {
  produceButton(value) {
    return (
      <div className='col-xs-6' key={value}>
        <label>
            <Radio value={value}/>
                <div className='box'>
                  <span>{value}</span>
                </div>
          </label>
      </div>
    );
  }

  render() {
    const buttons = this.props.values.map(this.produceButton);

    return (
      <div className='logic-block'>
        <RadioGroup name={this.props.name}
                    selectedValue={this.props.value}
                    onChange={this.props.onChange}>
                    {buttons}
        </RadioGroup>
      </div>
    );
  }
}
