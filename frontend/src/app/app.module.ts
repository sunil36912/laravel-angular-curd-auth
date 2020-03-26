import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { NavBarComponent } from './components/nav-bar/nav-bar.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { ProfileComponent } from './components/profile/profile.component';
import { RequestResetComponent } from './components/Password/request-reset/request-reset.component';
import { ResponseResetComponent } from './components/Password/response-reset/response-reset.component';
import { AppRoutingModule } from './app-routing.module';
import { FormsModule } from '@angular/forms';
import { DataTablesModule } from 'angular-datatables';



import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { JarwisService } from './service/jarwis.service';
import { ProductComponent } from './components/product/product.component';
import { AllProductsComponent } from './components/product/all-products/all-products.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { ToastrModule } from 'ngx-toastr';
import { ProductService } from './service/product/product.service';
import { NgxPaginationModule } from 'ngx-pagination';
import { PageNotFoundComponentComponent } from './components/page-not-found-component/page-not-found-component.component';
import { SubchildComponent } from './components/profile/subchild/subchild.component';
import { SubSubchildComponent } from './components/profile/subchild/sub-subchild/sub-subchild.component';







@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    LoginComponent,
    SignupComponent,
    ProfileComponent,
    RequestResetComponent,
    ResponseResetComponent,
    ProductComponent,
    AllProductsComponent,
    PageNotFoundComponentComponent,
    SubchildComponent,
    SubSubchildComponent



  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    BrowserAnimationsModule,
    DataTablesModule,
    BrowserAnimationsModule,

    NgxPaginationModule,
    ToastrModule.forRoot()




  ],
  providers: [
    ProductService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
