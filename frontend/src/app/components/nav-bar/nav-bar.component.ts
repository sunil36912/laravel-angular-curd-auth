import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/service/auth.service';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/service/token.service';
import { JarwisService } from 'src/app/service/jarwis.service';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent implements OnInit {
  public loggedIn: boolean;

  constructor(
    private Auth: AuthService,
    private router: Router,
    private Token: TokenService,
    private Jarwis: JarwisService,
  ) { }

  ngOnInit() {

    this.Auth.authStatus.subscribe(value => this.loggedIn = value);
  }

  logout(event: MouseEvent) {

    event.preventDefault();
    this.Token.remove();
    this.Auth.changeAuthStatus(false);
    this.router.navigateByUrl('/login');


  }

}
