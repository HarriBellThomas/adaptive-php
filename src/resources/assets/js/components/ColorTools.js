export default class ColorTools {
  static rgbToHsl(r, g, b) {
    r = r / 255;
    g = g / 255;
    b = b / 255;

  //  alert('r: ' + r + ' g: ' + g + ' b: ' + b);

    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2;

    if (max === min) {
      h = s = 0; // achromatic
    } else {
      var d = max - min;
      s = l > 0.5 ? d / (2 - max - min) : d / (max + min);

      switch (max) {
        case r: h = (g - b) / d + (g < b ? 6 : 0); break;
        case g: h = (b - r) / d + 2; break;
        case b: h = (r - g) / d + 4; break;
        //default: console.log('error');
      }
    }

//    alert('h: ' + h + ' s: ' + s + ' l: ' + l);
    h = h / 6;

    return [ h, s, l ];
  }

  static multiply (a, b) {
    var aNumRows = a.length, aNumCols = a[0].length,
        bNumRows = b.length, bNumCols = b[0].length,
        m = new Array(aNumRows);  // initialize array of rows
    for (var r = 0; r < aNumRows; ++r) {
      m[r] = new Array(bNumCols); // initialize the current row
      for (var c = 0; c < bNumCols; ++c) {
        m[r][c] = 0;             // initialize the current cell
        for (var i = 0; i < aNumCols; ++i) {
          m[r][c] += a[r][i] * b[i][c];
        }
      }
    }
    return m;
  }

  static limit(x) {
    return Math.max(Math.min(x, 1), 0);
  }

  static hslToRgb(h, s, l) {
    var r, g, b;

    if (s === 0) {
      r = g = b = l; // achromatic
    } else {
      function hue2rgb(p, q, t) {
        if (t < 0) t += 1;
        if (t > 1) t -= 1;
        if (t < 1/6) return p + (q - p) * 6 * t;
        if (t < 1/2) return q;
        if (t < 2/3) return p + (q - p) * (2/3 - t) * 6;
        return p;
      }

      var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
      var p = 2 * l - q;

      r = hue2rgb(p, q, h + 1/3);
      g = hue2rgb(p, q, h);
      b = hue2rgb(p, q, h - 1/3);
    }
    return [ r * 255, g * 255, b * 255 ];
  }

  static setPixelWithData(x, y, color, data) {
    const index = (x + y * data.width) * 4;
    data.data[index + 0] = color.r;
    data.data[index + 1] = color.g;
    data.data[index + 2] = color.b;
    data.data[index + 3] = color.a;
  }

 static getPixelWithData(x, y, data) {
    const index = (x + y * data.width) * 4;
    //alert('r: ' + data.data[index + 0] + ' g: ' + data.data[index + 1] + ' b: ' + data.data[index + 2]);

    return {r: data.data[index + 0],
            g: data.data[index + 1],
            b: data.data[index + 2],
            a: data.data[index + 3]};
}

  static applyRGBAFunctionToImageData(canvasDataOld, f, width, height) {
    for(var x=0; x<width; x++) {
      for(var y=0; y<height; y++) {
        this.setPixelWithData(
          x,
          y,
          f({x:x, y:y}, this.getPixelWithData(x,y,canvasDataOld)),
          canvasDataOld);
      }
    }
    return canvasDataOld;
  }

}
