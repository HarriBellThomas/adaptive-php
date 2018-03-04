import React from 'react';
import Slider from 'react-rangeslider';
import ToggleButton from 'react-toggle-button';
import OnOff from './OnOff';
import Picker from './Picker';
import 'react-rangeslider/lib/index.css';

export default class ExtraTools extends React.Component {
  /* TODO:
    speed bar -
    show Mouse ~
    type warning
    magnifier -
    password reveal
  */


  constructor(props) {
    super(props);

    this.speedBarChange = this.speedBarChange.bind(this);
    this.toggle = this.toggle.bind(this);
  }

  toggle (moduleName) {
    return value => this.props.onChange(moduleName,  {enabled: !value}, null, 'TOGGLE_ENABLE');
  }

  speedBarChange(moduleName, key) {
    return value => this.props.onChange(moduleName, {[key]: value});
  }


  render() {
    return (
    <div className='extra-tools'>
      <div className='row'>
        <div className='col-md-12'>
          <div className=''>
            <OnOff onToggle={this.toggle('speedBar')}
                   value={this.props.values.speedBar.enabled}
                   name='speed bar'>

                   <p>Speed: {this.props.values.speedBar.speed.toFixed(2).slice(0, -1)}</p>
                  <Slider min={0.2}
                          max={2}
                          value={this.props.values.speedBar.speed}
                          step={0.1}
                          onChange={this.speedBarChange('speedBar', 'speed')}/>

            </OnOff>

            <OnOff onToggle={this.toggle('showMouse')}
                   value={this.props.values.showMouse.enabled}
                   name='show mouse'>
                <Picker values={['fast', 'slow']}
                        name='speed'
                        onChange={this.speedBarChange('showMouse', 'speed')}/>
            </OnOff>

            <OnOff onToggle={this.toggle('typeWarning')}
                   value={this.props.values.typeWarning.enabled}
                   name='type warning'>
                   <Picker values={['flash', 'sound']}
                           name='type'
                           onChange={this.speedBarChange('typeWarning', 'type')}/>

            </OnOff>

            <OnOff onToggle={this.toggle('magnifier')}
                   value={this.props.values.magnifier.enabled}
                   name='magnifier'>
                   <p>Zoom level: {this.props.values.magnifier.zoom.toFixed(2).slice(0, -1)}</p>
                   <Slider min={1.5}
                           max={2.5}
                           value={this.props.values.magnifier.zoom}
                           step={0.1}
                           onChange={this.speedBarChange('magnifier', 'zoom')}/>

                        <p>Magnifier size: {this.props.values.magnifier.size}</p>
                  <Slider min={200}
                          max={500}
                          value={this.props.values.magnifier.size}
                          step={15}
                          onChange={this.speedBarChange('magnifier', 'size')}/>
            </OnOff>

            <OnOff onToggle={this.toggle('passwordReveal')}
                   value={this.props.values.passwordReveal.enabled}
                   name='password reveal'>
                   <p>Time delay: {this.props.values.passwordReveal.timeDelay}</p>
                   <Slider min={0}
                           max={5}
                           value={this.props.values.passwordReveal.timeDelay}
                           step={1}
                           onChange={this.speedBarChange('passwordReveal', 'timeDelay')} />
            </OnOff>

            <OnOff onToggle={this.toggle('darkMode')}
                   value={this.props.values.darkMode.enabled}
                   name='dark mode'>

            </OnOff>
            <OnOff onToggle={this.toggle('visionTools')}
                   value={this.props.values.visionTools.enabled}
                   name='image auto captioning?'>

            </OnOff>
          </div>
        </div>
      </div>
    </div>
  );

  }
}
