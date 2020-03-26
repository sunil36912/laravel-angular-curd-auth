import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TokenService {
  private iss = {
    login: 'http://localhost:8000/api/login',
    signup: 'http://localhost:8000/api/signup'
  };


  constructor() { }

  handle(token) {
    this.set(token);
  }

  set(token) {
    localStorage.setItem('token', token);
  }

  remove() {
    localStorage.removeItem('token');
  }

  loggedIn() {
    console.log(this.isValid());
    return this.isValid();
  }

  isValid() {
    const token = this.get();
    if (token) {
      const payload = this.payload(token);
      if (payload) {
        return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
      }
    }
    return false;
  }
  get() {
    console.log(localStorage.getItem('token'));
    return localStorage.getItem('token');
  }
  payload(token) {
    const payload = token.split('.')[1];
    return this.decode(payload);
  }

  decode(payload) {
    return JSON.parse(atob(payload));
  }


}
