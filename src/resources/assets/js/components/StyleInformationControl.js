import React from 'react';
import TagsInput from 'react-tagsinput';
import 'react-tagsinput/react-tagsinput.css';

export default class StyleInformationControl extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      title: '',
      tags: [],
    }

    this.updateValue = this.updateValue.bind(this);
    this.handleTagChange = this.handleTagChange.bind(this);
  }

  updateValue(value) {
    this.setState({title: value});
  }

  handleTagChange(tags) {
    this.setState({tags: tags});
  }

  render() {
    return (
      <div className='style-information-control'>
        <p>Title for your style: </p>
        <input value={this.state.title}
               onChange={(evt) => this.updateValue(evt.target.value)}
               className='title-input'/><br/><br/>
        <p>Tags for your style:</p>
        <TagsInput value={this.state.tags} onChange={this.handleTagChange} />
      </div>
    )
  }
}
