import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { TokenService } from './token.service';

@Injectable({
  providedIn: 'root'
})
export class AfterLoginService {
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Observable<boolean> | Promise<boolean> {
    return this.Token.loggedIn();
  }
  constructor(private Token: TokenService) { }
}
