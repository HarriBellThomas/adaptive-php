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
    const saveMessage = this.props.values.saved ? <p>Everything saved!</p>
                      : <button type='button'
                                className='btn btn-success'
                                onClick={() => this.props.onChange('SAVE')}
                                style={{padding: '10px'}}>
                                <p>Save</p>
                        </button>

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

        <p>Enable auto captioning of images?</p>
        <div className='center-wrapper'>
          <div className='toggle-wrapper'>
            <ToggleButton value={this.props.values.visionToolsEnabled}
                          onToggle={(value) => this.handleToggle('visionTools', value)} />
          </div>
        </div>
        <p>Enable dark mode?</p>
        <div className='center-wrapper'>
          <div className='toggle-wrapper'>
          <ToggleButton value={this.props.values.darkModeEnabled}
                        onToggle={(value) => this.handleToggle('darkMode', value)} />
          </div>
        </div>

      <br />
      <div className='center-wrapper'>
          <div className='toggle-wrapper'>
            {saveMessage}
          </div></div>
      </div>
    )
  }
}
