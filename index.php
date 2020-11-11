<?php include "top.php"; ?>
<main>
    <article>

        <!-- DIFFERING PART --> 
        <h2>What's Wrong - Home</h2>
        <section class="waste">
            <h3>Waste, Lots Of It</h3>
            <p class="indent">
                Humans produce a lot of waste. Like, a lot of waste.
                Did you know that the average American produces
                4.51 pounds of trash per day?
                In 2017, that was a total of 267.8 million tons of 
                <a href="https://tinyurl.com/yykwds7s" target="_blank">waste.</a>
                To put that into perspective, if you weighed 150 pounds,
                it would take approximately you and
                your 1.78 million identical twins to match
                the weight of all that waste.
                Now you might be wondering, how much of that is recycled?
                Well, it could certainly be better. In 2017, 35.2% of all that waste was
                either recycled or composted.
                So, what can we do as a community to improve that number?
                <!-- source is linked into the paragraph-->
            </p>

            <figure>
                <img alt="Lots of trash" src="image/trash.jpg">
                <figcaption>
                    <cite>Source: <a href="
                                     https://experiencelife.com/article/talking-trash/"
                                     target="_blank"> ExperienceLife</a></cite>
                </figcaption>
            </figure>
        </section>
        <section class="help">
            <h3>The Help</h3>
            <p class="indent">
                As individuals, we are left with a dilemma.
                What can we actually do to help compost and recycle
                in greater numbers? Aside from composting and recycling more, nothing.
                However, if we can band together as a community
                and spread awareness about how wasteful
                and irresponsible we are being, we stand a chance.
                So, what does this actually involve?
                Well, an easy example would be this very website.
                Anything that exists to provide
                valuable information to those who may be
                unaware is a crucial thing towards what can be done.
                Provided is a list of recommended things
                that you could do as an individual to help
                connect people with each other to create awareness:
            </p>
            <ul>
                <li>Volunteer at an environmentally focused organization</li>
                <li>Organize free public events to spread the movement</li>
                <li>Participate in local politics and present your ideas</li>
                <li><cite>Source: <a href="https://tinyurl.com/yxvg49by"
                                     target="_blank">
                            11 Ways to Raise Awareness</a></cite>
            </ul>
        </section>
        <section class="data">
            <h3>The Numbers</h3>
            <table>
                <caption> 2010-2017 Data on Food in MSW by
                    Weight (in thousands of U.S. tons) </caption>
                <tr>
                    <th>Management Pathway</th>
                    <th>2010</th>
                    <th>2015</th>
                    <th>2016</th>
                    <th>2017</th>
                </tr>

                <?php
                $sql = 'SELECT fldPathway, fld2010, fld2015, fld2016, fld2017 FROM tblData';

                $statement = $pdo->prepare($sql);
                $statement->execute();

                $records = $statement->fetchAll();

                foreach ($records as $record) {
                    print '<tr>';
                    print '<td>' . $record['fldPathway'] . '</td>';
                    print '<td>' . $record['fld2010'] . '</td>';
                    print '<td>' . $record['fld2015'] . '</td>';
                    print '<td>' . $record['fld2016'] . '</td>';
                    print '<td>' . $record['fld2017'] . '</td>';
                    print '</tr>' . PHP_EOL;
                }
                ?>
                <tr>
                    <th>Source</th>
                    <td colspan="4"><a href="https://tinyurl.com/yyao32xx"
                                       target="_blank">
                            <cite>epa.gov</cite></a></td>
                </tr>
            </table>
        </section>
        <!-- DIFFERING PART -->
    </article>
</main>

<?php include "footer.php"; ?>

</body>
</html>