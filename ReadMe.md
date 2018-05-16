# Desktop user
### Add more tab to user profile

*I guess you have your own logic for keeping the pages*
> You can implement this logic in class of page.

## About
> *This module add some Tab to user profile with some configuration.*
> For each user profile, tabs can be added for various purposes.
> For this use, flux, projects, agenda and tab review are added.
> From the profile editing page, the user can configure the visibility of pages/tabs. Off, Only Me, Public and Only Fiends.
> The visibility Only friends must be implemented in the next episode.
> Enjoy!

## What is happening?
> When the module is installed, a new field is created (the Field_design field to set configurations ) and foor new tab in the user profile.

## How it works?
> A class is created for each new page that is implemented in its controller via its service.

## More Fiendly use
> When creating a user, just like during the update, a rewrite of the url is done.
 - /new-user -------------- /user/5 ---------- French *generate by the system*
 - /new-user/agenda ------- /user/5/agenda --- French
 - /new-user/agenda ------- /user/5/agenda --- Anglais
 - /new-user/flux --------- /user/5/flux ----- French
 - /new-user/flux --------- /user/5/flux ----- Anglais
 - /new-user/projets ------ /user/5/projets -- French
 - /new-user/projets ------ /user/5/projets -- Anglais
 - /new-user/revue -------- /user/5/revue ---- French
 - /new-user/revue -------- /user/5/revue ---- Anglais