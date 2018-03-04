import React from 'react';
import TagsInput from 'react-tagsinput';
import ToggleButton from 'react-toggle-button';
import 'react-tagsinput/react-tagsinput.css';

export default class StyleInformationControl extends React.Component {
  constructor(props) {
    super(props);

    this.updateValue = this.updateValue.bind(this);
    this.handleTagChange = this.handleTagChange.bind(this);
    this.handleDefaultToggle = this.handleDefaultToggle.bind(this);
  }

  updateValue(value) {
    this.props.onChange('UPDATE_TITLE', value);
  }

  handleTagChange(tags) {
    this.props.onChange('UPDATE_TAGS', tags);
  }

  handleToggle(name, value) {
    this.props.onChange('TOGGLE', {name: name, value: !value});
  }

  handleDefaultToggle(event) {
    this.props.onChange('TOGGLE_DEFAULT', !this.props.values.defaultStyle);
  }


  render() {


    return (
      <div className='style-information-control'>
        <p>Title for your style: </p>
        <input value={this.props.values.title}
               onChange={(evt) => this.updateValue(evt.target.value)}
               className='title-input'
               onBlur={this.props.onBlur} /><br/><br/>
        <p>Tags for your style:</p>
        <TagsInput value={this.props.values.tags} onChange={this.handleTagChange} />
        <p>Default style?</p>

        <input type='checkbox'
               checked={this.props.values.defaultStyle}
               onChange={this.handleDefaultToggle} />

      <br />
    </div>
    )
  }
}
