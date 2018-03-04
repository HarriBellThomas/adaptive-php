import React from 'react';
import ReactDOM from 'react-dom';
import TimerChecker from './TimerChecker';
import App from './App';

import ImageContainer from './ImageContainer';
require('../../sass/index.scss');


// ========================================

if (document.getElementById('root')) {
  const element = document.getElementById('root');
  const props = Object.assign({},element.dataset);

  if (Object.keys(props).length != 0) {
    alert(JSON.stringify(props));
    props.modules = JSON.parse(props.modules);
    props.tags = JSON.parse(props.tags);
    props.hasSaved = props.hasSaved === "1" ? true : false;
    props.saved = props.saved === "1" ? true : false;
    props.defaultStyle = props.defaultStyle === "1" ? true : false;

    ReactDOM.render(<App props={props}/>, element);
  } else ReactDOM.render(<App />, element);
}
