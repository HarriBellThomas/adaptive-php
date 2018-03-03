import {Validator} from 'jsonschema';

export default class Validation {
  constructor() {
    this.validator = new Validator();
    this.schema = {
      'type': 'object',
      'properties': {
        'title': {'type': 'string', 'minLength': 1},
        'id': {},
        'saved': {'type': 'boolean'},
        'hasSaved': {'type': 'boolean'},
        'defaultStyle': {'type': 'boolean'},
        'modules' : {
          'type': 'array',
          'items': {
            '$ref': '/Module'
          }
        }
      },

      'required': ['title', 'defaultStyle'],
    }

    const moduleSchema = {
      'id': '/Module',
      'type': 'object',
      'enabled': 'boolean',
      'properties': {
        'module': {'type': 'string'},
        'properties': {'type': 'object'},
      }
    }

    this.validator.addSchema(moduleSchema, '/Module');
  }

  validate(json) {
    return this.validator.validate(json, this.schema);
  }
}
