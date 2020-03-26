import { Component, OnInit } from '@angular/core';
import { JarwisService } from 'src/app/service/jarwis.service';
import { Product } from '../product.model';
import { ProductService } from 'src/app/service/product/product.service';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';
import { fade, slideInOut } from 'src/app/animate';



@Component({
  selector: 'app-all-products',
  templateUrl: './all-products.component.html',
  styleUrls: ['./all-products.component.css'],
  animations: [
    slideInOut
  ]
})
export class AllProductsComponent implements OnInit {
  public error;
  list: Product[];



  constructor(
    private jarwis: ProductService,
    private tostr: ToastrService,
    private router: Router) {


  }

  ngOnInit() {
    this.jarwis.fetchAll();





  }
  populateForm(pro: Product) {
    this.jarwis.formData = pro;
  }
  productDelete(id: number) {
    if (confirm('Are You Sure You Want TO Delete It')) {
      this.jarwis.deleteProduct(id).subscribe(
        data => this.handleResponse(data),
        error => this.handleError(error)

      );
    }


  }






  handleResponse(res) {


    this.jarwis.fetchAll();
    this.tostr.warning(res.data, 'ShopCart!');
    this.router.navigateByUrl('/product');
  }

  handleError(error) {
    this.error = error.error.error;
    this.tostr.error(this.error, 'ShopCart!');
  }



}
