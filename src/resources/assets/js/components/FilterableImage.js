import React from 'react';
import ReactDOM from 'react-dom';
import ColorTools from './ColorTools';

export default class FilterableImage extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      original_image_data: null,
      curr_image_data: null,
    }
    this.componentDidMount = this.componentDidMount.bind(this);
    this.drawImage = this.drawImage.bind(this);
    this.applyFilter = this.applyFilter.bind(this);
  }

  componentDidMount() {
    var img = new window.Image();
    img.src = this.props.imageurl;
    img.onload = () => {
      const ctx = this.canvas.getContext('2d');
      ctx.drawImage(img, 0, 0);

      const image_data = ctx.getImageData(0, 0, this.props.width, this.props.height);
      const original_image_data = new ImageData(this.props.width, this.props.height);
      original_image_data.data.set(image_data.data.slice());

      this.setState(() => ({
        curr_image_data: image_data,
        original_image_data: original_image_data,
      }));
    };
  }

  drawImage() {
    const ctx = this.canvas.getContext('2d');
    ctx.putImageData(this.state.curr_image_data, 0, 0);
  }

  applyFilter() {
    // Has to be reigstered on parent to change when appropriate: DODGY! move up maybe??
    // But want image data to be seperate to the filer function...
    const original_image_data_copy = new ImageData(this.props.width, this.props.height);
    original_image_data_copy.data.set(this.state.original_image_data.data);

    this.setState(() =>
       ({curr_image_data: ColorTools.applyRGBAFunctionToImageData(
          original_image_data_copy,
          this.props.filter,
          this.props.width,
          this.props.height)}), this.drawImage);
  }

  render() {
    return (
      <canvas
        width={this.props.width}
        height={this.props.height}
        ref={(canvas) => {this.canvas = canvas;}}
      />
    );
  }

}
