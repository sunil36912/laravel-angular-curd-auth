import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MessageService {

  constructor() { }
  product_message() {
    return 'Product Created Successfully';
  }
}
