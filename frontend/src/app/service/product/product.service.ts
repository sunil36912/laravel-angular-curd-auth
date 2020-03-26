import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { TokenService } from '../token.service';


import { Product } from 'src/app/components/product/product.model';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { AuthService } from '../auth.service';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  private baseUrl = 'http://localhost:8000/api';

  public httpOptions;
  public formData: Product = {
    id: null,
    product_name: null,
    product_price: null,
    product_discount: null,
    product_stock: null,
    product_summary: null
  };
  public loading = false;

  list: Product[];
  public error = null;





  constructor(
    private http: HttpClient,
    private token: TokenService,
    private router: Router,
    private toastr: ToastrService,
    private Auth: AuthService


  ) { }

  get_token() {

    return this.httpOptions = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        Authorization: `Bearer ${this.token.get()}`
      })
    };
  }
  createProduct(data) {


    return this.http.post(`${this.baseUrl}/product`, data, this.get_token())
  }
  updateProduct(data) {
    return this.http.put(`${this.baseUrl}/product/` + data.id, data, this.get_token())
  }
  fetchAll() {
    this.http.get(`${this.baseUrl}/product`, this.get_token()).toPromise().then(
      data => this.handleResponse(data),
      error => this.handleError(error),

    );
    this.loading = true;
  }
  handleResponse(data) {
    this.list = data as Product[];
  }
  handleError(error) {
    console.log(error);
    this.error = error.error.message;
    this.toastr.warning(this.error, 'ShopCart!');
    this.token.remove();
    this.Auth.changeAuthStatus(false);
    this.router.navigateByUrl('/login');
  }

  deleteProduct(id) {
    return this.http.delete(`${this.baseUrl}/product/` + id, this.get_token())
  }
}
