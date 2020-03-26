import { Component, OnInit } from '@angular/core';


import { Router } from '@angular/router';


import { ToastrService } from 'ngx-toastr';
import { ProductService } from 'src/app/service/product/product.service';
import { HostBinding } from '@angular/core';
import {
  trigger,
  state,
  style,
  animate,
  transition,
  // ...
} from '@angular/animations';
import { fade, transorm } from 'src/app/animate';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css'],
  animations: [
    transorm,
    fade
  ]

})
export class ProductComponent implements OnInit {



  public errors = [];
  public message: string;
  constructor(
    private Jarwis: ProductService,

    private router: Router,
    private toastr: ToastrService
  ) { }

  onSubmit() {
    if (this.Jarwis.formData.id === null) {

      this.Jarwis.createProduct(this.Jarwis.formData).subscribe(
        data => this.handleResponse(data),
        error => this.handleError(error)

      );
    }
    else {
      this.Jarwis.updateProduct(this.Jarwis.formData).subscribe(
        data => this.handleResponse(data),
        error => this.handleError(error)

      );

    }


  }
  handleResponse(res) {

    this.Jarwis.formData = {
      id: null,
      product_name: null,
      product_price: null,
      product_stock: null,
      product_discount: null,
      product_summary: null,
    };
    this.Jarwis.fetchAll();
    this.toastr.success(res.data, 'ShopCart!');
    this.errors = [];
    this.router.navigateByUrl('/product');
  }

  handleError(error) {
    this.errors = error.error.errors;
    this.toastr.error('please Check The Errors', 'ShopCart!');
  }
  reset() {
    this.Jarwis.formData = {
      id: null,
      product_name: null,
      product_price: null,
      product_stock: null,
      product_discount: null,
      product_summary: null,
    };
  }



  ngOnInit() {



  }

}
