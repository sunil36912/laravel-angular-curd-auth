import { trigger, state, transition, animate, style } from '@angular/animations';

export let fade = trigger('fadeInOut', [
    state('void', style({
        opacity: 0
    })),
    transition('void <=> *', animate(1000)),
])
export let transorm = trigger('transform', [
    state('void', style({
        opacity: 0,
        transform: 'translateX(' + 20 + 'px)'
    })),
    transition('void <=> *', animate(1000)),
])
export let slideInOut = trigger('slideInOut', [
    transition(':enter', [
        style({ transform: 'translateY(-100%)' }),
        animate('200ms ease-in', style({ transform: 'translateY(0%)' }))
    ]),
    transition(':leave', [
        animate('200ms ease-in', style({ transform: 'translateY(-100%)' }))
    ])
])