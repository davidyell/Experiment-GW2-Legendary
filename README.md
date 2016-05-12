# GW2-Legendary
A simple application to track the resources and hierarchy needed to build a legendary weapon in Guild Wars 2.

## Premise
There needs to be a good way to track your actual progress towards the creation of a legendary weapon, by tracking the aquisition of the component materials and displaying them in a hierarchical fashion so that it's visually easy to see what things you are missing.

## Features
* ~~Hierarchical view to easily show which ingredients go together to make the legendary~~
* ~~Tracks the numbers of ingredients so you know what you've got left to gather~~
* Tracks totals where multiple stacks of ingredients are needed for different components
* ~~A nice big percentage progress bar~~
* ~~Ability to select the legendary and see the ingredient tree~~
* Perhaps import the costs for ingredients
* ~~Hash of progress to the url, so progress can be linked, or bookmarked.~~ 
 * Perhaps backed by db with login.

## References
* http://gw2legendary.com/
* http://www.gw2db.com/
* https://www.gw2spidy.com/
* http://wiki.guildwars2.com/wiki/Legendary_weapon
 * http://wiki.guildwars2.com/wiki/Kudzu

## Wireframe
http://imgur.com/P47ZDY2

## My current progress with Kudzu

```bash
cd webroot && php -S localhost:8765
```

http://localhost:8765/legendary/kudzu#2=1&3=200&4=250&5=1&6=1&7=500&10=28&11=231&12=94&13=100&14=1&15=19&17=12&18=25&19=21&22=15&23=17&24=10&25=54&28=1&30=74&31=250&32=250&33=250&35=250&36=17&39=390
