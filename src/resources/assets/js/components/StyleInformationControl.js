import React from 'react';
import TagsInput from 'react-tagsinput';
import 'react-tagsinput/react-tagsinput.css';

export default class StyleInformationControl extends React.Component {
  constructor(props) {
    super(props);

    this.updateValue = this.updateValue.bind(this);
    this.handleTagChange = this.handleTagChange.bind(this);
  }

  updateValue(value) {
    this.props.onChange('UPDATE_TITLE', value);
  }

  handleTagChange(tags) {
    this.props.onChange('UPDATE_TAGS', tags);
  }


  render() {
    return (
      <div className='style-information-control'>
        <p>Title for your style: </p>
        <input value={this.props.values.title}
               onChange={(evt) => this.updateValue(evt.target.value)}
               className='title-input'/><br/><br/>
        <p>Tags for your style:</p>
        <TagsInput value={this.props.values.tags} onChange={this.handleTagChange} />
        <div className='center-wrapper'>
          <div className='toggle-wrapper'>
          <button className='btn btn-success save-btn' onClick={() => this.props.onChange('SAVE')}>Save</button>
          </div></div>
      </div>
    )
  }
}
