import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ProfileComponent } from './components/profile/profile.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { BeforeLoginService } from './service/before-login.service';
import { AfterLoginService } from './service/after-login.service';
import { ProductComponent } from './components/product/product.component';
import { AllProductsComponent } from './components/product/all-products/all-products.component';
import { RequestResetComponent } from './components/Password/request-reset/request-reset.component';
import { ResponseResetComponent } from './components/Password/response-reset/response-reset.component';
import { PageNotFoundComponentComponent } from './components/page-not-found-component/page-not-found-component.component';
import { SubchildComponent } from './components/profile/subchild/subchild.component';
import { SubSubchildComponent } from './components/profile/subchild/sub-subchild/sub-subchild.component';


const routes: Routes = [

  {
    path: 'login',
    component: LoginComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path: 'signup',
    component: SignupComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path: 'request-password-reset',
    component: RequestResetComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path: 'response-password-reset',
    component: ResponseResetComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path: 'profile',
    component: ProfileComponent,
    children: [
      {
        path: 'child',
        component: SubchildComponent,
        children: [
          {
            path: 'subchild',
            component: SubSubchildComponent
          }

        ]
      }
    ]

  },
  {
    path: 'product',
    component: ProductComponent,
    canActivate: [AfterLoginService]



  },
  {
    path: 'allProducts',
    component: AllProductsComponent,
    canActivate: [AfterLoginService]

  },
  {
    path: '',
    redirectTo: '/login',
    pathMatch: 'full'
  },
  { path: '**', component: PageNotFoundComponentComponent }


];

@NgModule({
  declarations: [],
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
