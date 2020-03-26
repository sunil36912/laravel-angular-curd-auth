import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { TokenService } from './token.service';
import { Product } from '../components/product/product.model';



@Injectable({
  providedIn: 'root'
})
export class JarwisService {
  private baseUrl = 'http://localhost:8000/api';

  public httpOptions;





  constructor(
    private http: HttpClient,
    private token: TokenService

  ) { }

  get_token() {
    //console.log(` i am Bearer ${this.token.get()}`);
    return this.httpOptions = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        Authorization: `Bearer ${this.token.get()}`
      })
    };
  }
  signup(data) {
    return this.http.post(`${this.baseUrl}/signup`, data)
  }
  login(data) {
    return this.http.post(`${this.baseUrl}/login`, data)
  }


  sendPasswordResetLink(data) {
    return this.http.post(`${this.baseUrl}/sendPasswordResetLink`, data)
  }

  changePassword(data) {
    return this.http.post(`${this.baseUrl}/resetPassword`, data)
  }




}
