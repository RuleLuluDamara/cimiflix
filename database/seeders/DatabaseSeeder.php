<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cast;
use App\Models\Post;
use App\Models\User;
use App\Models\Genre;
use App\Models\Likes;
use App\Models\Movie;
use App\Models\comment;
use App\Models\Payment;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Cast_movie;
use App\Models\RatingUmur;
use App\Models\User_rating;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\MovieStatuses;
use App\Models\Payment_method;
use Illuminate\Database\Seeder;
use App\Http\Controllers\SubscriptionStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'person 1',
            'username' => 'person11',
            'email' => 'a@example.com',
            'password' => bcrypt('password')
        ]);
        $users = [
            ['John Doe', 'johndoe@example.com', 'password1'],
            ['Jane Smith', 'janesmith@example.com', 'password2'],
            ['David Johnson', 'davidjohnson@example.com', 'password3'],
            ['Sarah Williams', 'sarahwilliams@example.com', 'password4'],
            ['Michael Brown', 'michaelbrown@example.com', 'password5'],
            ['Jennifer Davis', 'jenniferdavis@example.com', 'password6'],
            ['Christopher Miller', 'christophermiller@example.com', 'password7'],
            ['Jessica Wilson', 'jessicawilson@example.com', 'password8'],
            ['Matthew Taylor', 'matthewtaylor@example.com', 'password9'],
            ['Emily Anderson', 'emilyanderson@example.com', 'password10'],
            ['Daniel Thomas', 'danielthomas@example.com', 'password11'],
            ['Olivia Martinez', 'oliviamartinez@example.com', 'password12'],
            ['Andrew Clark', 'andrewclark@example.com', 'password13'],
            ['Emma Rodriguez', 'emmarodriguez@example.com', 'password14'],
            ['Joseph Lee', 'josephlee@example.com', 'password15'],
            ['Madison Walker', 'madisonwalker@example.com', 'password16'],
            ['Joshua Hall', 'joshuahall@example.com', 'password17'],
            ['Ava Green', 'avagreen@example.com', 'password18'],
            ['Christopher Adams', 'christopheradams@example.com', 'password19'],
            ['Sophia Campbell', 'sophiacampbell@example.com', 'password20'],
            ['Logan Hill', 'loganhill@example.com', 'password21'],
            ['Isabella Mitchell', 'isabellamitchell@example.com', 'password22'],
            ['Joseph Phillips', 'josephphillips@example.com', 'password23'],
            ['Mia Turner', 'miaturner@example.com', 'password24'],
            ['Ethan Carter', 'ethancarter@example.com', 'password25'],
            ['Charlotte Murphy', 'charlottemurphy@example.com', 'password26'],
            ['David Stewart', 'davidstewart@example.com', 'password27'],
            ['Abigail Rivera', 'abigailrivera@example.com', 'password28'],
            ['Alexander Coleman', 'alexandercoleman@example.com', 'password29'],
            ['Emily Barnes', 'emilybarnes@example.com', 'password30']
        ];

        foreach ($users as $user) {
            $username = str_replace(' ', '', strtolower($user[0])); // Membuat username berdasarkan nama pengguna

            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'username' => $username,
                'password' => bcrypt($user[2]),
            ]);
        }

        $movies = [
            ['Avengers: Endgame', '2019-04-26', 'After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', '4K', '03:01:00', 'Anthony Russo, Joe Russo', 'Marvel Studios', 1, 1, 1],
            ['The Shawshank Redemption', '1994-09-23', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', '1080', '02:22:00', 'Frank Darabont', 'Columbia Pictures', 2, 1, 1],
            ['Pulp Fiction', '1994-10-14', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', '1080', '02:34:00', 'Quentin Tarantino', 'Miramax Films', 3, 1, 1],
            ['Inception', '2010-07-16', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'HD', '02:28:00', 'Christopher Nolan', 'Warner Bros. Pictures', 4, 1, 1],
            ['The Notebook', '2004-06-25', 'A poor yet passionate young man falls in love with a rich young woman, giving her a sense of freedom, but they are soon separated because of their social differences.', '1080', '02:03:00', 'Nick Cassavetes', 'New Line Cinema', 5, 1, 1],
            ['Indiana Jones and the Raiders of the Lost Ark', '1981-06-12', 'Archaeologist and adventurer Indiana Jones is hired by the U.S. government to find the Ark of the Covenant before the Nazis.', '1080', '01:55:00', 'Steven Spielberg', 'Paramount Pictures', 6, 1, 1],
            ['The Matrix', '1999-03-31', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', '1080', '02:16:00', 'Lana Wachowski, Lilly Wachowski', 'Warner Bros. Pictures', 7, 1, 1],
            ['The Shining', '1980-05-23', 'A family heads to an isolated hotel for the winter where a sinister presence influences the father into violence, while his psychic son sees horrific forebodings from both past and future.', '1080', '02:26:00', 'Stanley Kubrick', 'Warner Bros. Pictures', 8, 1, 1],
            ['Toy Story', '1995-11-22', 'A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boys room.', '1080', '01:21:00', 'John Lasseter', 'Pixar Animation Studios', 9, 1, 1],
            ['Mad Max: Fury Road', '2015-05-15', 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.', '1080', '02:00:00', 'George Miller', 'Warner Bros. Pictures', 1, 2, 1],
            ['The Fault in Our Stars', '2014-06-06', 'Two teenage cancer patients begin a life-affirming journey to visit a reclusive author in Amsterdam.', '1080', '02:06:00', 'Josh Boone', '20th Century Fox', 2, 2, 1],
            ['Superbad', '2007-08-17', 'Two co-dependent high school seniors are forced to deal with separation anxiety after their plan to stage a booze-soaked party goes awry.', '1080', '01:59:00', 'Greg Mottola', 'Columbia Pictures', 3, 2, 1],
            ['Gone Girl', '2014-10-03', 'With his wifes disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when its suspected that he may not be innocent.', '1080', '02:29:00', 'David Fincher', '20th Century Fox', 4, 2, 1],
            ['La La Land', '2016-12-09', 'While navigating their careers in Los Angeles, a pianist and an actress fall in love while attempting to reconcile their aspirations for the future.', '1080', '02:08:00', 'Damien Chazelle', 'Lionsgate', 5, 2, 1],
            ['Jurassic Park', '1993-06-11', 'A pragmatic paleontologist visiting an almost complete theme park is tasked with protecting a couple of kids after a power failure causes the parks cloned dinosaurs to run loose.', '1080', '02:07:00', 'Steven Spielberg', 'Universal Pictures', 6, 2, 1],
            ['Interstellar', '2014-11-07', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanitys survival.', '1080', '02:49:00', 'Christopher Nolan', 'Paramount Pictures', 7, 2, 1],
            ['Get Out', '2017-02-24', 'A young African-American visits his white girlfriends parents for the weekend, where his simmering uneasiness about their reception of him eventually reaches a boiling point.', '1080', '01:44:00', 'Jordan Peele', 'Universal Pictures', 8, 2, 1],
            ['Finding Nemo', '2003-05-30', 'After his son is captured in the Great Barrier Reef and taken to Sydney, a timid clownfish sets out on a journey to bring him home.', '1080', '01:40:00', 'Andrew Stanton', 'Pixar Animation Studios', 9, 2, 1],
            ['John Wick', '2014-10-24', 'An ex-hit-man comes out of retirement to track down the gangsters that killed his dog and took everything from him.', '4K', '01:41:00', 'Chad Stahelski', 'Lionsgate', 1, 3, 1],
            ['Fight Club', '1999-10-15', 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', '1080', '02:19:00', 'David Fincher', '20th Century Fox', 2, 3, 1],
            ['The Hangover', '2009-06-05', 'Three buddies wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing. They make their way around the city in order to find their friend before his wedding.', '1080', '01:40:00', 'Todd Phillips', 'Warner Bros. Pictures', 3, 3, 1],
            ['Se7en', '1995-09-22', 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', '1080', '02:07:00', 'David Fincher', 'New Line Cinema', 4, 3, 1],
            ['Eternal Sunshine of the Spotless Mind', '2004-03-19', 'When their relationship turns sour, a couple undergoes a medical procedure to have each other erased from their memories.', '1080', '01:48:00', 'Michel Gondry', 'Focus Features', 5, 3, 1],
            ['The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.', '1080', '02:58:00', 'Peter Jackson', 'New Line Cinema', 6, 3, 1],
            ['Blade Runner', '1982-06-25', 'A blade runner must pursue and terminate four replicants who stole a ship in space, and have returned to Earth to find their creator.', '1080', '01:57:00', 'Ridley Scott', 'Warner Bros. Pictures', 7, 3, 1],
            ['The Exorcist', '1973-12-26', 'When a 12-year-old girl is possessed by a mysterious entity, her mother seeks the help of two priests to save her.', '1080', '02:02:00', 'William Friedkin', 'Warner Bros. Pictures', 8, 3, 1],
            ['Shrek', '2001-05-18', 'A mean lord exiles fairytale creatures to the swamp of a grumpy ogre, who must go on a quest and rescue a princess for the lord in order to get his land back.', 'HD', '01:30:00', 'Andrew Adamson, Vicky Jenson', 'DreamWorks Animation', 9, 3, 1],
            ['Die Hard', '1988-07-20', 'An NYPD officer tries to save his wife and several others taken hostage by German terrorists during a Christmas party at the Nakatomi Plaza in Los Angeles.', '1080', '02:12:00', 'John McTiernan', '20th Century Fox', 1, 4, 1],
            ['The Godfather', '1972-03-24', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', '1080', '02:55:00', 'Francis Ford Coppola', 'Paramount Pictures', 2, 4, 1],
            ['The Big Lebowski', '1998-03-06', 'Jeff "The Dude" Lebowski, mistaken for a millionaire of the same name, seeks restitution for his ruined rug and enlists his bowling buddies to help get it.', '1080', '01:57:00', 'Joel Coen, Ethan Coen', 'PolyGram Filmed Entertainment', 3, 4, 1],
            ['Heat', '1995-12-15', 'A group of professional bank robbers start to feel the heat from police when they unknowingly leave a clue at their latest heist.', '4K', '02:50:00', 'Michael Mann', 'Warner Bros. Pictures', 4, 4, 1],
            ['Casablanca', '1942-11-26', 'A cynical American expatriate struggles to decide whether or not he should help his former lover and her fugitive husband escape French Morocco.', '1080', '01:42:00', 'Michael Curtiz', 'Warner Bros. Pictures', 5, 4, 1],
            ['Raiders of the Lost Ark', '1981-06-12', 'Archaeologist and adventurer Indiana Jones is hired by the U.S. government to find the Ark of the Covenant before the Nazis.', '1080', '01:55:00', 'Steven Spielberg', 'Paramount Pictures', 6, 4, 1],
            ['Blade Runner 2049', '2017-10-06', 'A young blade runners discovery of a long-buried secret leads him to track down former blade runner Rick Deckard, whos been missing for thirty years.', '1080', '02:44:00', 'Denis Villeneuve', 'Warner Bros. Pictures', 7, 4, 1],
            ['The Shining', '1980-05-23', 'A family heads to an isolated hotel for the winter where a sinister presence influences the father into violence, while his psychic son sees horrific forebodings from both past and future.', '1080', '02:26:00', 'Stanley Kubrick', 'Warner Bros. Pictures', 8, 4, 1],
            ['Frozen 2', '2019-11-22', 'Anna, Elsa, Kristoff, Olaf, and Sven leave Arendelle to travel to an ancient, autumn-bound forest of an enchanted land. They set out to find the origin of Elsas powers in order to save their kingdom.', '1080', '01:43:00', 'Jennifer Lee, Chris Buck', 'Walt Disney Animation Studios', 9, 1, 2],
            ['Black Widow', '2021-07-09', 'Natasha Romanoff, also known as Black Widow, confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy and the broken relationships left in her wake long before she became an Avenger.', '1080', '02:14:00', 'Cate Shortland', 'Marvel Studios', 1, 2, 2],
            ['The French Dispatch', '2021-10-22', 'A love letter to journalists set in an outpost of an American newspaper in a fictional 20th-century French city that brings to life a collection of stories published in "The French Dispatch" magazine.', '1080', '01:48:00', 'Wes Anderson', 'Searchlight Pictures', 2, 2, 2],
            ['Free Guy', '2021-08-13', 'A bank teller discovers that hes actually an NPC inside a brutal, open-world video game.', '1080', '01:55:00', 'Shawn Levy', '20th Century Studios', 3, 2, 2],
            ['No Time to Die', '2021-10-08', 'James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.', '1080', '02:43:00', 'Cary Joji Fukunaga', 'Metro-Goldwyn-Mayer', 4, 2, 2],
            ['The Last Letter from Your Lover', '2021-07-23', 'A pair of interwoven stories set in the present and past follow an ambitious journalist determined to solve the mystery of a forbidden love affair at the center of a trove of secret love letters from 1965.', '1080', '01:50:00', 'Augustine Frizzell', 'Stu-dioCanal, The Film Farm', 5, 2, 2],
            ['Jungle Cruise', '2021-07-30', 'Based on Disneylands theme park ride where a small riverboat takes a group of travelers through a jungle filled with dangerous animals and reptiles, but with a supernatural element.', '1080', '02:07:00', 'Jaume Collet-Serra', 'Walt Disney Pictures', 6, 2, 2],
            ['Dune', '2021-10-22', 'Feature adaptation of Frank Herberts science fiction novel, about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', '1080', '02:35:00', 'Denis Villeneuve', 'Warner Bros. Pictures', 7, 2, 2],
            ['Halloween Kills', '2021-10-15', 'The saga of Michael Myers and Laurie Strode continues in the next thrilling chapter of the Halloween series.', '1080', '01:45:00', 'David Gordon Green', 'Universal Pictures', 8, 2, 2],
            ['Sing 2', '2021-12-22', 'Buster Moon and his friends must persuade reclusive rock star Clay Calloway to join them for the opening of a new show.', '1080', '01:52:00', 'Garth Jennings', 'Universal Pictures', 9, 2, 2],
            ['Top Gun: Maverick', '2022-05-27', 'After more than thirty years of service as one of the Navys top aviators, Pete "Maverick" Mitchell is where he belongs, pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him.', '1080', '02:18:00', 'Joseph Kosinski', 'Paramount Pictures', 1, 3, 2],
            ['Belfast', '2022-09-16', 'A young boy and his working-class family experience the tumultuous late 1960s.', '1080', '01:37:00', 'Kenneth Branagh', 'Focus Features', 2, 3, 2],
            ['Jackass Forever', '2022-10-22', 'Celebrating the joy of being back together with your best friends and a perfectly executed shot to the dingdong, the original jackass crew return for another round of hilarious, wildly absurd, and often dangerous displays of comedy with a little help from some exciting new cast.', '1080', '01:45:00', 'Jeff Tremaine', 'Paramount Pictures', 3, 3, 2],
            ['Malignant', '2021-09-10', 'Madison is paralyzed by shocking visions of grisly murders, and her torment worsens as she discovers that these waking dreams are in fact terrifying realities.', '1080', '01:51:00', 'James Wan', 'Warner Bros. Pictures', 4, 3, 2],
            ['Deep Water', '2022-01-14', 'A well-to-do husband who allows his wife to have affairs in order to avoid a divorce becomes a prime suspect in the disappearance of her lovers.', '1080', '02:16:00', 'Adrian Lyne', '20th Century Studios', 5, 3, 2],
            ['Jurassic World: Dominion', '2022-06-10', 'Plot unknown. Third installment of the "Jurassic World" franchise.', '4K', '02:20:00', 'Colin Trevorrow', 'Universal Pictures', 6, 3, 2],
            ['The Matrix Resurrections', '2021-12-22', 'The Matrix Resurrections is an upcoming American science fiction action film produced, co-written, and directed by Lana Wachowski. It is the fourth installment in The Matrix film series, set to be produced and released by Warner Bros. Pictures.', '1080', '02:28:00', 'Lana Wachowski', 'Warner Bros. Pictures', 7, 3, 2],
            ['Scream', '2022-01-14', 'A new installment of the "Scream" horror franchise will follow a woman returning to her home town to try to find out who has been committing a series of vicious crimes.', '1080', '01:52:00', 'Matt Bettinelli-Olpin, Tyler Gillett', 'Paramount Pictures', 8, 3, 2],
            ['Toy Story 4', '2019-06-21', 'When a new toy called "Forky" joins Woody and the gang, a road trip alongside old and new friends reveals how big the world can be for a toy.', '1080', '01:40:00', 'Josh Cooley', 'Pixar Animation Studios', 9, 1, 2],
            ['Fast & Furious 9', '2021-06-25', 'Cipher enlists the help of Jakob, Doms younger brother, to take revenge on Dom and his team.', '1080', '02:25:00', 'Justin Lin', 'Universal Pictures', 1, 2, 2],
            ['The Trial of the Chicago 7', '2020-10-16', 'The story of 7 people on trial stemming from various charges surrounding the uprising at the 1968 Democratic National Convention in Chicago, Illinois.', '1080', '02:09:00', 'Aaron Sorkin', 'Cross Creek Pictures', 2, 2, 2],
            ['Ghostbusters: Afterlife', '2021-11-19', 'When a single mom and her two kids arrive in a small town, they begin to discover their connection to the original Ghostbusters and the secret legacy their grandfather left behind.', '1080', '02:04:00', 'Jason Reitman', 'Columbia Pictures', 3, 2, 2],
            ['Tenet', '2020-09-03', 'Armed with only one word -- Tenet -- and fighting for the survival of the entire world, the Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', '1080', '02:30:00', 'Christopher Nolan', 'Warner Bros. Pictures', 4, 2, 2],
            ['The Kissing Booth 2', '2020-07-24', 'In the sequel to 2018s THE KISSING BOOTH, high school senior Elle juggles a long-distance relationship with her dreamy boyfriend Noah, college applications, and a new friendship with a handsome classmate that could change everything.', '1080', '02:10:00', 'Vince Marcello', 'Komixx Entertainment', 5, 2, 2],
            ['Indiana Jones 5', '2022-06-29', 'The plot is unknown at this time.', '1080', '01:09:00', 'James Mangold', 'Lucasfilm Ltd.', 6, 2, 2],
            ['Avatar 2', '2022-12-16', 'A sequel to Avatar [2009].', '1080', '01:09:00', 'James Cameron', '20th Century Studios', 7, 2, 2],
            ['Halloween Ends', '2022-10-14', 'The saga of Michael Myers and Laurie Strode ends.', '1080', '01:09:00', 'David Gordon Green', 'Universal Pictures', 8, 2, 2],
            ['Minions: The Rise of Gru', '2022-07-01', 'The untold story of one twelve-year-olds dream to become the worlds greatest supervillain.', '1080', '01:09:00', 'Kyle Balda', 'Illumination Entertainment', 9, 2, 2],
            ['John Wick: Chapter 4', '2022-05-27', 'Plot unknown.', '1080', '01:09:00', 'Chad Stahelski', 'Lionsgate', 1, 3, 2],
            ['Killers of the Flower Moon', '2022-09-16', 'Members of the Osage tribe in the United States are murdered under mysterious circumstances in the 1920s sparking a major F.B.I. investigation involving J. Edgar Hoover.', '1080', '01:09:00', 'Martin Scorsese', 'Apple Studios', 2, 3, 2],
            ['Dont Worry Darling', '2022-11-23', 'A psychological thriller about a 1950s housewife whose reality begins to crack, revealing a disturbing truth underneath.', '1080', '01:09:00', 'Olivia Wilde', 'New Line Cinema', 3, 3, 2],
            ['Nightmare Alley', '2021-12-17', 'An ambitious carny with a talent for manipulating people with a few well-chosen words hooks up with a female psychiatrist who is even more dangerous than he is.', '1080', '01:09:00', 'Guillermo del Toro', 'Searchlight Pictures', 4, 3, 2],
            ['The French Dispatch', '2021-10-22', 'A love letter to journalists set in an outpost of an American newspaper in a fictional twentieth century French city that brings to life a collection of stories published in "The French Dispatch Magazine".', '1080', '01:48:00', 'Wes Anderson', 'Searchlight Pictures', 5, 3, 2],
            ['Mission: Impossible 7', '2022-05-27', 'Seventh entry in the Mission: Impossible series.', '1080', '01:09:00', 'Christopher McQuarrie', 'Paramount Pictures', 6, 3, 2],
            ['Black Adam', '2022-07-29', 'Plot unknown. The film will be a prequel focusing on Black Adams origin story, while also introducing the superhero team Justice Society of America.', '1080', '01:09:00', 'Jaume Collet-Serra', 'Warner Bros. Pictures', 7, 3, 2],
            ['Salems Lot', '2023-05-23', 'A man who returns to his hometown to confront the sinister forces responsible for his mothers death when he was a young boy.', '1080', '01:09:00', 'Gary Dauberman', 'New Line Cinema', 8, 3, 2],
        ];

        foreach ($movies as $movie) {

            Movie::create([
                'name' => $movie[0],
                'slug' => Str::slug($movie[0], '-'),
                'rilis' => $movie[1],
                'body' => $movie[2],
                'excerpt' => substr($movie[2], 0, 30),
                'resolusi' => $movie[3],
                'durasi' => $movie[4],
                'director' => $movie[5],
                'studio_production' => $movie[6],
                'genre_id' => $movie[7],
                'rating_umur_id' => $movie[8],
                'status_id' => $movie[9],
            ]);
        }

        $userRatings = [
            [4, 1, 1],
            [3, 4, 1],
            [5, 3, 2],
            [4, 1, 2],
            [2, 4, 3],
            [4, 5, 3],
            [5, 6, 4],
            [3, 2, 4],
            [4, 7, 5],
            [2, 8, 5],
            [5, 9, 6],
            [3, 10, 6],
            [4, 11, 7],
            [2, 12, 7],
            [5, 13, 8],
            [4, 14, 8],
            [3, 15, 9],
            [2, 16, 9],
            [4, 17, 10],
            [5, 18, 10],
            [3, 19, 11],
            [4, 20, 11],
            [2, 21, 12],
            [5, 22, 12],
            [4, 23, 13],
            [3, 24, 13],
            [5, 25, 14],
            [2, 26, 14],
            [4, 27, 15],
            [3, 28, 15],
            [1, 29, 16],
            [3, 30, 16],
            [5, 31, 17],
            [4, 32, 17],
            [2, 33, 18],
            [4, 34, 18],
            [5, 35, 19],
            [3, 36, 19],
            [4, 37, 20],
            [2, 38, 20],
            [5, 39, 21],
            [4, 40, 21],
            [3, 41, 22],
            [4, 42, 22],
            [2, 43, 23],
            [5, 44, 23],
            [4, 45, 24],
            [3, 46, 24],
            [5, 47, 25],
            [2, 48, 25],
            [4, 49, 26],
            [3, 50, 26],
            [5, 51, 27],
            [4, 52, 27],
            [2, 53, 28],
            [4, 54, 28],
            [5, 55, 29],
            [3, 56, 29],
            [4, 57, 30],
            [2, 58, 30],
            [5, 59, 1],
            [4, 60, 1],
            [3, 61, 2],
            [4, 62, 2],
            [2, 63, 3],
            [5, 64, 3],
            [4, 65, 4],
            [3, 66, 4],
            [5, 67, 5],
            [2, 68, 5],
            [4, 69, 6],
            [3, 70, 6],
            [5, 71, 7],
            [4, 72, 7],
            [2, 1, 8],
            [4, 2, 8],
            [5, 3, 9],
            [3, 4, 9],
            [4, 5, 10],
            [2, 6, 10],
            [5, 7, 11],
            [4, 8, 11],
            [3, 9, 12],
            [4, 10, 12],
            [2, 11, 13],
            [5, 12, 13],
            [4, 13, 14],
            [3, 14, 14],
            [5, 15, 15],
            [2, 16, 15],
        ];

        foreach ($userRatings as $userRating) {
            $rating = $userRating[0];
            $movieId = $userRating[1];
            $userId = $userRating[2];

            User_rating::create([
                'rating' => $rating,
                'movie_id' => $movieId,
                'user_id' => $userId,
            ]);
        }

        $userBookmarks = [
            [true, 1, 1],
            [true, 1, 2],
            [false, 2, 3],
            [false, 2, 4],
            [false, 3, 5],
            [false, 3, 6],
            [false, 4, 7],
            [false, 4, 8],
            [false, 5, 9],
            [false, 5, 10],
            [false, 6, 11],
            [false, 6, 12],
            [false, 7, 13],
            [false, 7, 14],
            [false, 8, 15],
            [false, 8, 16],
            [false, 9, 17],
            [false, 9, 18],
            [false, 10, 19],
            [false, 10, 20],
            [false, 11, 21],
            [false, 11, 22],
            [false, 12, 23],
            [false, 12, 24],
            [false, 13, 25],
            [false, 13, 26],
            [false, 14, 27],
            [false, 14, 28],
            [false, 15, 29],
            [false, 15, 30],
            [false, 16, 31],
            [false, 16, 32],
            [false, 17, 33],
            [false, 17, 34],
            [false, 18, 35],
            [false, 18, 36],
            [false, 19, 37],
            [false, 19, 38],
            [false, 20, 39],
            [false, 20, 40],
            [false, 21, 41],
            [false, 21, 42],
            [false, 22, 43],
            [false, 22, 44],
            [false, 23, 45],
            [false, 23, 46],
            [false, 24, 47],
            [false, 24, 48],
            [false, 25, 49],
            [false, 25, 50],
            [false, 26, 51],
            [false, 26, 52],
            [false, 27, 53],
            [false, 27, 54],
            [false, 28, 55],
            [false, 28, 56],
            [false, 29, 57],
            [false, 29, 58],
            [false, 30, 59],
            [false, 30, 60],
            [true, 1, 61],
            [true, 1, 62],
            [false, 2, 63],
            [false, 2, 64],
            [false, 3, 65],
            [false, 3, 66],
            [false, 4, 67],
            [false, 4, 68],
            [false, 5, 69],
            [false, 5, 70],
            [false, 6, 71],
            [false, 7, 1],
            [false, 7, 2],
            [false, 8, 3],
            [false, 8, 4],
            [false, 9, 5],
            [false, 9, 6],
            [false, 10, 7],
            [false, 10, 8]
        ];

        foreach ($userBookmarks as $userBookmark) {

            Bookmark::create([
                'bookmark_status' => $userBookmark[0],
                'user_id' => $userBookmark[1],
                'movie_id' => $userBookmark[2],
            ]);
        }

        $comments = [
            ['Great movie!', '2023-01-01 10:00:00', 5, 15],
            ['I loved the storyline!', '2023-01-02 12:30:00', 10, 35],
            ['Amazing cinematography!', '2023-01-03 15:45:00', 15, 50],
            ['The acting was top-notch.', '2023-01-04 17:20:00', 8, 20],
            ['This movie made me cry.', '2023-01-05 19:10:00', 3, 66],
            ['I was on the edge of my seat throughout the movie.', '2023-01-06 21:05:00', 16, 45],
            ['The soundtrack was incredible!', '2023-01-07 09:30:00', 7, 32],
            ['I would definitely recommend this movie!', '2023-01-08 11:45:00', 21, 55],
            ['The plot twist blew my mind!', '2023-01-09 14:20:00', 13, 23],
            ['The special effects were stunning.', '2023-01-10 16:55:00', 25, 48],
            ['I couldn\'t stop laughing!', '2023-01-11 18:40:00', 4, 11],
            ['The performances were outstanding.', '2023-01-12 20:15:00', 19, 42],
            ['This movie left me speechless.', '2023-01-13 09:20:00', 2, 7],
            ['I enjoyed every minute of it!', '2023-01-14 11:10:00', 27, 38],
            ['The chemistry between the actors was amazing.', '2023-01-15 13:25:00', 12, 27],
            ['I was pleasantly surprised by this movie.', '2023-01-16 15:40:00', 18, 59],
            ['The dialogue was clever and witty.', '2023-01-17 17:15:00', 9, 17],
            ['I\'m already planning to watch it again!', '2023-01-18 19:05:00', 24, 51],
            ['The cinematography was breathtaking.', '2023-01-19 21:00:00', 1, 36],
            ['The characters were so relatable.', '2023-01-20 09:45:00', 6, 29],
            ['I was hooked from the beginning.', '2023-01-21 12:00:00', 14, 47],
            ['The suspense kept me on the edge of my seat.', '2023-01-22 14:15:00', 20, 64],
            ['It\'s a must-watch!', '2023-01-23 16:30:00', 11, 13],
            ['The movie had a powerful message.', '2023-01-24 18:25:00', 26, 41],
            ['The visual effects were mind-blowing.', '2023-01-25 20:40:00', 17, 56],
            ['I was completely immersed in the story.', '2023-01-26 09:10:00', 22, 33],
            ['The movie exceeded my expectations.', '2023-01-27 11:35:00', 5, 25],
            ['I couldn\'t take my eyes off the screen.', '2023-01-28 13:50:00', 23, 53],
            ['The movie left me in awe.', '2023-01-29 16:05:00', 16, 22],
            ['I can\'t wait to watch it again!', '2023-01-30 18:20:00', 7, 37],
        ];

        foreach ($comments as $comment) {
            comment::create([
                'message' => $comment[0],
                'waktu_comment' => $comment[1],
                'user_id' => $comment[2],
                'movie_id' => $comment[3],
            ]);
        }

        $subscriptions = [
            ['2023-06-01', '2023-06-30', true, 1],
            ['2023-06-02', '2023-07-01', true, 2],
            ['2023-06-03', '2023-07-02', true, 3],
            ['2023-06-04', '2023-07-03', true, 4],
            ['2023-06-05', '2023-07-04', true, 5],
            ['2023-06-06', '2023-07-05', true, 6],
            ['2023-06-07', '2023-07-06', true, 7],
            ['2023-06-08', '2023-07-07', true, 8],
            ['2023-06-09', '2023-07-08', true, 9],
            ['2023-06-10', '2023-07-09', true, 10],
            ['2023-06-11', '2023-07-10', true, 11],
            ['2023-06-12', '2023-07-11', true, 12],
            ['2023-06-13', '2023-07-12', true, 13],
            ['2023-06-14', '2023-07-13', true, 14],
            ['2023-06-15', '2023-07-14', true, 15],
            ['2023-05-01', '2023-05-31', false, 16],
            ['2023-05-02', '2023-06-01', false, 17],
            ['2023-05-03', '2023-06-02', false, 18],
            ['2023-05-04', '2023-06-03', false, 19],
            ['2023-05-05', '2023-06-04', false, 20],
            ['2023-05-06', '2023-06-05', false, 21],
            ['2023-05-07', '2023-06-06', false, 22],
            ['2023-05-08', '2023-06-07', false, 23],
            ['2023-05-09', '2023-06-08', false, 24],
            ['2023-05-10', '2023-06-09', false, 25],
            ['2023-05-11', '2023-06-10', false, 26],
            ['2023-05-12', '2023-06-11', false, 27],
            ['2023-05-13', '2023-06-12', false, 28],
            ['2023-05-14', '2023-06-13', false, 29],
        ];

        foreach ($subscriptions as $subscription) {

            Subscription::create([
                'start_date' => $subscription[0],
                'end_date' => $subscription[1],
                'status' => $subscription[2],
                'user_id' => $subscription[3],
            ]);
        }

        $payments = [
            [1, '2023-06-01', 100000, true, 1, 1],
            [2, '2023-06-02', 100000, true, 2, 1],
            [3, '2023-06-03', 100000, true, 3, 1],
            [4, '2023-06-04', 100000, true, 4, 1],
            [5, '2023-06-05', 100000, true, 5, 1],
            [6, '2023-06-06', 100000, true, 6, 1],
            [7, '2023-06-07', 100000, true, 7, 1],
            [8, '2023-06-08', 100000, true, 8, 1],
            [9, '2023-06-09', 100000, true, 9, 1],
            [10, '2023-06-10', 100000, true, 10, 1],
            [11, '2023-06-11', 100000, true, 11, 1],
            [12, '2023-06-12', 100000, true, 12, 1],
            [13, '2023-06-13', 100000, true, 13, 1],
            [14, '2023-06-14', 100000, true, 14, 1],
            [15, '2023-06-15', 100000, true, 15, 1],
            [16, '2023-06-01', 0, false, 16, 2],
            [17, '2023-06-02', 0, false, 17, 2],
            [18, '2023-06-03', 0, false, 18, 2],
            [19, '2023-06-04', 0, false, 19, 2],
            [20, '2023-06-05', 0, false, 20, 2],
            [21, '2023-06-06', 0, false, 21, 2],
            [22, '2023-06-07', 0, false, 22, 2],
            [23, '2023-06-08', 0, false, 23, 2],
            [24, '2023-06-09', 0, false, 24, 2],
            [25, '2023-06-10', 0, false, 25, 2],
            [26, '2023-06-11', 0, false, 26, 2],
            [27, '2023-06-12', 0, false, 27, 2],
            [28, '2023-06-13', 0, false, 28, 2],
            [29, '2023-06-14', 0, false, 29, 2],
            [30, '2023-06-15', 0, false, 30, 2],
            [31, '2023-06-01', 0, false, 1, 3],
            [32, '2023-06-02', 0, false, 2, 3],
            [33, '2023-06-03', 0, false, 3, 3],
            [34, '2023-06-04', 0, false, 4, 3],
            [35, '2023-06-05', 0, false, 5, 3],
            [36, '2023-06-06', 0, false, 6, 3],
            [37, '2023-06-07', 0, false, 7, 3],
            [38, '2023-06-08', 0, false, 8, 3],
            [39, '2023-06-09', 0, false, 9, 3],
            [40, '2023-06-10', 0, false, 10, 3],
            [41, '2023-06-11', 0, false, 11, 3],
            [42, '2023-06-12', 0, false, 12, 3],
            [43, '2023-06-13', 0, false, 13, 3],
            [44, '2023-06-14', 0, false, 14, 3],
            [45, '2023-06-15', 0, false, 15, 3],
        ];

        foreach ($payments as $payment) {
            $id = $payment[0];
            $paymentDate = $payment[1];
            $total = $payment[2];
            $status = $payment[3];
            $subscriptionId = $payment[4];
            $paymentMethodId = $payment[5];

            Payment::create([
                'payment_date' => $paymentDate,
                'total' => $total,
                'status' => $status,
                'subscription_id' => $subscriptionId,
                'payment_method_id' => $paymentMethodId,
            ]);
        }

        Genre::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);

        Genre::create([
            'name' => 'Drama',
            'slug' => 'drama'
        ]);

        Genre::create([
            'name' => 'Comedy',
            'slug' => 'comedy'
        ]);

        Genre::create([
            'name' => 'Thriller',
            'slug' => 'thriller'
        ]);

        Genre::create([
            'name' => 'Romance',
            'slug' => 'romance'
        ]);

        Genre::create([
            'name' => 'Adventure',
            'slug' => 'adventure'
        ]);

        Genre::create([
            'name' => 'Sci-Fi',
            'slug' => 'sci-fi'
        ]);

        Genre::create([
            'name' => 'Horror',
            'slug' => 'horror'
        ]);

        Genre::create([
            'name' => 'Animation',
            'slug' => 'animation'
        ]);
        Payment_method::create([
            'method' => 'Kartu Kredit'
        ]);
        Payment_method::create([
            'method' => 'Transfer Bank'
        ]);
        Payment_method::create([
            'method' => 'E-Wallet'
        ]);

        MovieStatuses::create([
            'jenis' => 'paid'
        ]);
        MovieStatuses::create([
            'jenis' => 'free'
        ]);
        RatingUmur::create([
            'rate' => 'General'
        ]);
        RatingUmur::create([
            'rate' => '13+'
        ]);
        RatingUmur::create([
            'rate' => '17+'
        ]);
        RatingUmur::create([
            'rate' => '21+'
        ]);

        //Post::factory(10)->create();
        //Movie::factory(15)->create();
        //User_rating::factory(15)->create();
        //Bookmark::factory(15)->create();
        //Likes::factory(15)->create();
        //comment::factory(15)->create();
        Cast::factory(15)->create();
        Cast_movie::factory(30)->create();
        //Subscription::factory(2)->create();
        //Payment::factory(3)->create();
    }
}