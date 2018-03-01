import React from 'react';

export default class ParagraphReader extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      currentWord: 0,
    };

    this.words = this.props.children.match(/\S+/g);
    this.componentDidMount = this.componentDidMount.bind(this);
    this._initSpeech = this._initSpeech.bind(this);
    this.highlightNthWord = this.highlightNthWord.bind(this);
  }

  componentDidMount() {
    this._initSpeech();
  }

  componentWillUpdate(nextProps, nextState) {
    if (!this.props.talking && nextProps.talking) {
      alert(this.utterance.text);
      window.speechSynthesis.cancel();
      window.speechSynthesis.speak(this.utterance);
    } else if (this.props.speed != nextProps.speed) {
      window.speechSynthesis.cancel();
      this.utterance.rate = nextProps.speed;
    }
  }

  highlightNthWord(event) {
    console.log(event.charIndex);
    this.setState((prevState) => ({currentWord: prevState.currentWord + 1}));
  }

  _initSpeech() {
    const {speed}  = this.props;
    window.speechSynthesis.cancel();
    this.utterance = new SpeechSynthesisUtterance(this.props.children);
    this.utterance.rate = speed;
    // BUG: onboundary not supported by Linux
    this.utterance.onboundary = this.highlightNthWord;

  }

  render() {
    const panelOutput = [...this.words];
    for (var i = 0; i < panelOutput.length; i++) {
      panelOutput[i] = <span style =
                          {(i == this.state.currentWord) ?
                            {backgroundColor: 'yellow'} : {}}
                          key={i}>
                            {this.words[i] + ' '}
                        </span>
    }

    return (
      <div style={this.foregroundCoverStyle}
           onClick={this.props.onClick}>
        <div style={this.state.style}>
          {panelOutput}
        </div>
      </div>
    );
  }

}
