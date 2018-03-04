import React from 'react';
import '../../sass/paragraphReaderStyles.scss';


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
    // TODO: Not very efficent.
    for (var i = 0; i < panelOutput.length; i++) {
      panelOutput[i] = <span style =
                          {(i == this.state.currentWord) ?
                            {backgroundColor: 'yellow'} : {}}
                          key={i}>
                            {this.words[i] + ' '}
                        </span>
    }

    const bgColor =  'rgba(255, 255, 255,' +  this.props.opacity + ')';

    if (this.props.talking) {
      return (
        <div className={'paragraph-background-cover'}
             style={{backgroundColor: bgColor,
                     zIndex: 999}}>
            <div className='paragraph-cover'
                 style={{left: ((window.innerWidth - 600) / 2) + "px",
                         fontSize: this.props.size + "px"}}>
              {panelOutput}
            </div>

        </div>
      );
    } else {
      return (
        <div onClick={this.props.onClick}>
          <p>{this.props.children} </p> <br />
        </div>
      );
    }
  }

}
