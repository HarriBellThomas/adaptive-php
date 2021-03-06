import React from 'react';
import {RadioGroup, Radio} from 'react-radio-group';
import ColorTools from './ColorTools';
import FilterableImage from './FilterableImage';
import ControlPanel from './ControlPanel';
import '../../sass/radioButtons.scss';
import {Tooltip} from 'react-tippy';


export default class ColorBlindnessControl extends React.Component {
  constructor(props) {
    super(props);

    this.options = [
      'Normal',
      'Protanopia',
      'Protanomaly',
      'Deuteranopia',
      'Deuteranomaly',
      'Tritanopia',
      'Tritanomaly',
      'Achromatopsia',
      'Achromatomaly',
    ];

    this.matricies = {
        Normal: {
          R: [100, 0, 0],
          G: [0, 100, 0],
          B: [0, 0, 100]
        },
        Protanopia: {
          R: [56.667, 43.333, 0],
          G: [55.833, 44.167, 0],
          B: [0, 24.167, 75.833]
        },
        Protanomaly: {
          R: [81.667, 18.333, 0],
          G: [33.333, 66.667, 0],
          B: [0, 12.5, 87.5]
        },
        Deuteranopia: {
          R: [62.5, 37.5, 0],
          G: [70, 30, 0],
          B: [0, 30, 70]
        },
        Deuteranomaly: {
          R: [80, 20, 0],
          G: [25.833, 74.167, 0],
          B: [0, 14.167, 85.833]
        },
        Tritanopia: {
          R: [95, 5, 0],
          G: [0, 43.333, 56.667],
          B: [0, 47.5, 52.5]
        },
        Tritanomaly: {
          R: [96.667, 3.333, 0],
          G: [0, 73.333, 26.667],
          B: [0, 18.333, 81.667]
        },
        Achromatopsia: {
          R: [29.9, 58.7, 11.4],
          G: [29.9, 58.7, 11.4],
          B: [29.9, 58.7, 11.4]
        },
        Achromatomaly: {
          R: [61.8, 32, 6.2],
          G: [16.3, 77.5, 6.2],
          B: [16.3, 32.0, 51.6]
        }
    };
    
    this.blindnessTypes = ['None', 'Deuteranopia', 'Protanopia', 'Tritanopia'];

    this.handleRadioButton = this.handleRadioButton.bind(this);
    this.filter = this.filter.bind(this);
  }

  handleRadioButton(value) {
    this.props.onChange({identifier: value}, this.filterableImage.applyFilter);

  }

  filter (xy, rgba) {
     const rgb2lms = [[17.8824, 43.5161, 4.11935],
                     [3.45565, 27.1554, 3.86714],
                     [0.0299566, 0.184309, 1.46709]];

     const cb_matrices = {
       Deuteranopia: [[1, 0, 0], [0.494207, 0, 1.24827], [0, 0, 1]],
       Protanopia: [[0, 2.02344, -2.52581], [0, 1, 0], [0, 0, 1]],
       Tritanopia: [[1, 0, 0], [0, 1, 0], [-0.395913, 0.801109, 0]],
       None: [[1, 0, 0], [0, 1, 0], [0, 0, 1]],
     };

     /*Precomputed inverse*/
     const lms2rgb = [[8.09444479e-02, -1.30504409e-01, 1.16721066e-01],
                      [-1.02485335e-02, 5.40193266e-02, -1.13614708e-01],
                      [-3.65296938e-04, -4.12161469e-03, 6.93511405e-01]];


    const LMSMatrix = ColorTools.multiply(rgb2lms, [[rgba.r], [rgba.g], [rgba.b]]);
    const colourBlindChangeMatrix = ColorTools.multiply(cb_matrices[this.props.values.identifier], LMSMatrix);
    const simulatedMatrix = ColorTools.multiply(lms2rgb, colourBlindChangeMatrix);
    const errorMatrix = [[Math.abs(rgba.r - simulatedMatrix[0][0])], [Math.abs(rgba.g - simulatedMatrix[1][0])], [Math.abs(rgba.b - simulatedMatrix[2][0])]];
    const modMatrix = [[0, 0, 0], [0.7, 1, 0], [0.7, 0, 1]];
    const fixedMatrix = ColorTools.multiply(modMatrix, errorMatrix);

    let limit = function (a) {
      if (a > 255) return 255;
      else if (a < 0) return 0;
      else return a;
    };
    return {
      r: limit(rgba.r + fixedMatrix[0][0]),
      g: limit(rgba.g + fixedMatrix[1][0]),
      b: limit(rgba.b + fixedMatrix[2][0]),
      a: rgba.a
    }
  }

  render() {
    const row1 = [
      <div className='col-xs-6' key={this.blindnessTypes[0]}>
        <label>
          <Radio value={this.blindnessTypes[0]}/>
              <div className='box'>
                <span>{this.blindnessTypes[0]}</span>
              </div>
        </label></div>,

      <div className='col-xs-6' key={this.blindnessTypes[1]}>
        <label key={this.blindnessTypes[1]}>
          <Radio value={this.blindnessTypes[1]}/>
            <Tooltip title={'Adjust webpages to make them more accesible for people with ' + this.blindnessTypes[1] + '.'}>
              <div className='box'>
                {this.blindnessTypes[1]}
              </div>
            </ Tooltip>
        </label>
        </div>
      ];

    const row2 = this.blindnessTypes.slice(2, 4).map((type) =>
    <div className='col-xs-6' key={type}>
      <label>
          <Radio value={type}/>
            <Tooltip title={'Adjust webpages to make them more accesible for people with ' + type + '.'}>
              <div className='box'>
                <span>{type}</span>
              </div>
            </Tooltip>
        </label>
      </div>
      );


    return (
      <div className='color-blindness-control'>
        <div className='row'>
          <div className='col-md-4'>
            <ControlPanel controlPanelName='color blindness filters'
                          value={this.props.values.enabled}
                          onChange={(value) => this.props.onChange(value, null, 'TOGGLE_ENABLE')}>
              <RadioGroup name='color-blindness-type'
                          selectedValue={this.props.values.identifier}
                          onChange={this.handleRadioButton}
                          onBlur={this.props.onBlur}>
                <div className='row'>
                    {row1}
                </div>
                <div className='row'>
                    {row2}
                </div>
              </RadioGroup>
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
            </div></div>
          </div>
        </div>
      </div>
    );
  }
}
