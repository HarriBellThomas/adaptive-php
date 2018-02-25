/*
MIT License

Copyright (c) 2017 Sonsoles

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

 */


import React, {Component} from 'react';

export default class ClickNHold extends Component {

    constructor(props) {
        super(props);
        this.state = {
            holding: false,
            start: 0,
            ended: 'begin',
        }

        this.start = this.start.bind(this);
        this.end = this.end.bind(this);
        this.timeout = this.timeout.bind(this);
    }

    /*Start callback*/
    start(e){
        let ended = this.state.ended;
        let start = Date.now()
        this.setState({start: start, holding: true, ended: false});
        let rightNumber = this.props.time && this.props.time > 0;
        let time = rightNumber ? this.props.time : 2;
        if (!rightNumber) {console.warn("You have specified an unvalid time prop for ClickNHold. You need to specify a number > 0. Default time is 2.")}
        if (ended) {
            setTimeout(function(){this.timeout(start)}.bind(this),
               time*1000+1);
        }
        if (this.props.onStart) {
            this.props.onStart(e);
        }
        document.documentElement.addEventListener('mouseup', this.end);

    }

    /*End callback*/
    end(e) {
        document.documentElement.removeEventListener('mouseup', this.end);
        if(this.state.ended) {
          return false;
        }
        let endTime = Date.now(); //End time
        let minDiff = this.props.time * 1000; // In seconds
        let startTime = this.state.start; // Start time
        let diff = endTime - startTime; // Time difference
        let isEnough = diff >= minDiff; // It has been held for enough time
        this.setState({holding: false, ended: true});
        if (this.props.onEnd){
          this.props.onEnd(e, isEnough);
        }
     }

    /*Timeout callback*/
    timeout(start){
        if (!this.state.ended && start === this.state.start){
            if(this.props.onClickNHold){
                this.props.onClickNHold(start);
                this.setState({ holding: false});
                return;
            }
        }
    }

    render() {
        let classList = this.props.className ? (this.props.className +' '):' ';
        classList += this.state.holding ? 'cnh_holding ':'';
        classList += this.state.ended ? 'cnh_ended ':'';
         return (
            <div className={classList}
                 onMouseDown={this.start}
                 onTouchStart={this.start}
                 onMouseUp={this.end}
                 onTouchCancel={this.end}
                 onTouchEnd={this.end}>
                 <button className='my-btn' style={this.state.holding ? this.props.holdingStyle : this.props.endedStyle}>
                   {this.props.text}
                 </button>

            </div>);
    }
}
