import React from 'react';
import ReactDOM from 'react-dom';
import ColorTools from './ColorTools';
import FilterableImage from './FilterableImage';
import ValueInput from './ValueInput';
import ControlPanel from './ControlPanel';

export default class ImageContainer extends React.Component {
  constructor(props) {
    super(props);

    this.saturate = this.saturate.bind(this);
    this.changeBrightness = this.changeBrightness.bind(this);
    this.changeContrast = this.changeContrast.bind(this);
    this.handleSaturationFactorChange = this.handleSaturationFactorChange.bind(this);
    this.handleBrightnessFactorChange = this.handleBrightnessFactorChange.bind(this);
    this.handleContrastFactorChange = this.handleContrastFactorChange.bind(this);

    this.filter = this.filter.bind(this);
  }


  onComponentDidMount() {
    this.filterableImage.applyFilter();
  }

  saturate(xy, rgba) {
    var hsl = ColorTools.rgbToHsl(rgba.r,rgba.g,rgba.b);
    hsl[1] = ColorTools.limit(hsl[1] * this.props.values.saturationFactor);
    var rgb = ColorTools.hslToRgb(hsl[0],hsl[1],hsl[2]);
    return {
      r: Math.round(rgb[0]),
      g: Math.round(rgb[1]),
      b: Math.round(rgb[2]),
      a: rgba.a
    };
  }

  changeBrightness(xy,rgba) {
    return {
      r: rgba.r + Math.round(this.props.values.brightnessFactor),
      g: rgba.g + Math.round(this.props.values.brightnessFactor),
      b: rgba.b + Math.round(this.props.values.brightnessFactor),
      a: rgba.a
    }
  }

  changeContrast(xy, rgba) {
    var hsl = ColorTools.rgbToHsl(rgba.r,rgba.g,rgba.b);
    hsl[2] = ColorTools.limit(hsl[2]*this.props.values.contrastFactor);
    var rgb = ColorTools.hslToRgb(hsl[0],hsl[1],hsl[2]);
    return {
      r: Math.round(rgb[0]),
      g: Math.round(rgb[1]),
      b: Math.round(rgb[2]),
      a: rgba.a
    }
  }

  filter(xy, rgba) {
    return this.changeContrast(xy, this.changeBrightness(xy, this.saturate(xy, rgba)));
  }

  handleContrastFactorChange(value) {
    this.props.onChange({contrastFactor: value}, this.filterableImage.applyFilter);
  }

  handleSaturationFactorChange(value) {
    this.props.onChange({saturationFactor: value}, this.filterableImage.applyFilter);
  }

  handleBrightnessFactorChange(value) {
    this.props.onChange({brightnessFactor: value * 10}, this.filterableImage.applyFilter);
  }

  render() {
    return (
      <div className='image-sandbox'>
        <div className='row'>
          <div className='col-md-4'>
              <ControlPanel controlPanelName='color filters'
                            value={this.props.values.enabled}
                            onChange={(value) => this.props.onChange(value, null, 'TOGGLE_ENABLE')}>

              <ValueInput defaultValue={this.props.values.saturationFactor}
                          updateFunction={this.handleSaturationFactorChange}
                          inc={0.1}
                          unit=''
                          description='Saturation '
                          tip='Change the colorfulness of webpages.'
                          onBlur={this.props.onBlur}/>
              <ValueInput defaultValue={this.props.values.brightnessFactor / 10}
                          updateFunction={this.handleBrightnessFactorChange}
                          inc={0.3}
                          unit=''
                          description='Brightness '
                          tip='Change the brightness of webpages.'
                          onBlur={this.props.onBlur}/>
              <ValueInput defaultValue={this.props.values.contrastFactor}
                          updateFunction={this.handleContrastFactorChange}
                          inc={0.1}
                          unit=''
                          description='Contrast '
                          tip='Change the contrast of webpages.'
                          onBlur={this.props.onBlur}/>
            </ControlPanel>
          </div>
          <div className='col-md-8'>
            <div className='center-wrapper'>
              <div className='toggle-wrapper'>
              <FilterableImage imageurl={this.props.imageurl}
                               width={this.props.width}
                               height={this.props.height}
                               filter={this.filter}
                               ref={(elem) => this.filterableImage = elem}/>
                           </div>
            </div>
          </div>
        </div>
      </div>
      );
  }

}
