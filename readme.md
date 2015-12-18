# P4 for DWA-15 Fall 2015
## QuizMark

## Live URL
<http://p4.philipjames.me>

## Planning Doc
[Philip Kelnhofer P4 Planning Doc](http://bit.ly/1ORWQcg)

## Demo Screencast
<https://youtu.be/YVLIqejY0ls>

## Description
This website is for taking online quizzes. It allows for users who are teachers to create and edit quizzes while non-teachers can only take quizzes and view their grades.

## Details for teaching team
When the database is seeded there are four users that are created by default. 
* jill@harvard.edu - Teacher
* john@harvard.edu
* jennifer@havard.edu
* jamal@harvard.edu

All of them have the same password (helloworld), and the three non-teacher's all have taken different number of quizzes when seeded.

There are four quizzes (with corresponding questions and answers) also built while seeded
* Alphabet Quiz - active; has grades
* Numbers Quiz - active; has grades
* Other Quiz - inactive; no grades; ready to set to active
* Not Ready Quiz - inactive; no grades; not ready to be set to active

I put in checks so that if a non-teacher tries to a not ready quiz by directly entering the address it will return my 404 error page. If they try to view a quiz they have already taken, they are given a flash message and redirected to the home page. If a non-student tries to access any of the "edit" pages they are simply redirected to the home page with no flash message (I figured that I would not want students to even know if they were on the right track with such entries.)

Teachers are simply redirected to the Quiz Listing page if the try to directly enter an invalid quiz, question or answer edit URL with an appropriate flash message.


## Outside code
* Bootstrap: via MaxCDN <https://www.bootstrapcdn.com/>
* Bootstrap Yeti Template: via Bootswatch <https://www.bootstrapcdn.com/bootswatch/>
* Bootstrap Sticky Footer CSS: <https://getbootstrap.com/examples/sticky-footer/>