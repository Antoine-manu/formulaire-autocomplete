<?php

include "database.php";
   

// $adresse =''
// $ville =''
// $postalcode = ''



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
</head>

<body>

    <header class="row">
        <img src="logo_la_manu_formation_400.png" alt="" class="col-md-2">
        <h1 class="col-md-10">Formulaire d'inscription a la MANU</h1>
    </header>
    <section class="container">



        <h3>Your informations :</h3>

        <form action="post" novalidate>

            <fieldset id="pageinfouser">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control " id="surname" placeholder="Enter your surname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control " id="name" placeholder="Enter your Name" required>
                    </div>
                </div>
                <div class="form-row" id="app">
                    <div class="form-group col-md-8">
                        <label for="adress">Adress</label>
                        <input @keyup="getapi" v-model="search" type="text" class="form-control" id="adress"
                            placeholder="Enter your Adress" required>
                        <ul class="list-group" v-if="isloading">
                            <li class="list-group-item" v-for="info in info.features">
                                <a v-on:click="adressefunction()">{{info.properties.label}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="town">Town</label>
                        <input v-model="city" type="text" class="form-control" id="town" placeholder="Enter your town"
                            required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="pc">Postal code</label>
                        <input v-model="cp" type="text" class="form-control" id="pc"
                            placeholder="Enter your postal code" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter your Phone number" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bdate">Birth date</label>
                        <input type="date" class="form-control " id="bdate" placeholder="Enter your Birth date"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bc">Birth country</label>
                        <select class="form-control" id="bc" required>
                            <option value="0" disabled selected>Select your birth country</option>
                            <?php
      for ($i=0;$i<=(count($countries)-1);$i++){
          ?>
                            <option value="<?php echo $countries[$i] ?>"><?php echo $countries[$i] ?></option>
                            <?php
      }
      ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bdep">Birth department</label>
                    <input type="text" class="form-control" id="bdep" placeholder="Enter your Birth department"
                        required>
                </div>
                <div class="form-group">
                    <label for="bp">Birth place</label>
                    <input type="text" class="form-control" id="bp" placeholder="Enter your Birth place" required>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <select class="form-control" id="nationality" required>
                        <option value="0" disabled selected>Select your nationalty</option>
                        <?php
      for ($i=0;$i<=(count($nationals)-1);$i++){
          ?>
                        <option value="<?php echo $nationals[$i] ?>"><?php echo $nationals[$i] ?></option>
                        <?php
      }
      ?>
                    </select>
                </div>

                <h3>Formations :</h3>
                <div class="form-group">
                    <label for="fomation">Studies</label>
                    <select class="form-control" name="fomation" id="formation" required>
                        <option value="none" disabled selected>Select your studies</option>
                        <option value="terminal">Terminal</option>
                        <option value="prepa">Classe préparatoire</option>
                        <option value="licence1">Licence 1ère année</option>
                        <option value="licence2">Licence 2ème année</option>
                        <option value="dut">DUT</option>
                        <option value="bts">BTS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diploma">Diploma</label>
                    <select class="form-control" name="diploma" id="diploma" required>
                        <option value="select" selected disabled>Select your diploma</option>
                        <option value="none">None</option>
                        <option value="dut">DUT</option>
                        <option value="bts">BTS</option>
                        <option value="licenceandother">Licence ou autre</option>
                    </select>
                </div>
            </fieldset>

            <fieldset id="pageinfoformation">
                <h3>Personne a prevenir en cas d'urgence</h3>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" placeholder="Enter his surname" required>
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter his Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter his Phone number" required>
                </div>
                <div class="form-group">
                    <label for="phonefix">Phone fixe number</label>
                    <input type="tel" class="form-control" id="phonefix" placeholder="Enter your Phone fixe number"
                        aria-describedby="phoneHelp">
                    <small id="phoneHelp" class="form-text text-muted">Not required</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter his email"
                        required>
                </div>
            </fieldset>
            <fieldset id="pageinfoelse">
                <h3>Other informations about you</h3>
                <div class="form-group">
                    <textarea class="form-control" id="other" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="picture">Picture of you</label>
                    <input type="file" class="form-control" name="img[]" class="file" accept="image/*" id="picture">
                </div>


                <div class="form-check col-md-6">
                    <input class="form-check-input" type="checkbox" id="accept">
                    <label class="form-check-label" for="accept">
                        Acceptance of all the clauses of the internal regulations.
                    </label>
                </div>

                <div class="form-check col-md-6">
                    <input class="form-check-input" type="checkbox" id="accept2">
                    <label class="form-check-label" for="accept2">
                        Acceptance of the respect of all the clauses of the computer charter.
                    </label>
                </div>
                <div class="form-check col-md-6">
                    <input class="form-check-input" type="checkbox" id="imageright">
                    <label class="form-check-label" for="imageright">
                        Image rights.
                    </label>
                </div>
            </fieldset>

            <div>
                <button type="submit" class="btn btn-outline-primary" id="submit" class="buttonmodif">Submit</button>
                <nav aria-label="...">
                    <ul class="pagination m-auto">
                        <li class="page-item active"><a class="page-link" id="page1">1</a></li>
                        <li class="page-item"><a class="page-link" id="page2">2</a></li>
                        <li class="page-item"><a class="page-link" id="page3">3</a></li>
                    </ul>
                </nav>
            </div>


        </form>

    </section>

    <footer>
        <p>Formulaire fait par Antoine Gaudry</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="scirpt.js"></script>
</body>

</html>