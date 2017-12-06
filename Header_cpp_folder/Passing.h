#include <iostream>
#include <iomanip>
#include <vector>
#include <string>
using namespace std;

class Passing
{

public:

	Passing();
		
	Passing(string fn, string ln, string tn, int att, int comp, double per, int yar, double YPA,
		int td, double TPD, int inter, double INTP, int LG, int Sack, int TFL, double PR);

	void SetFirstName(string fn);							//set and get functions for name
	void SetLastName(string ln);
	void SetTeamName(string tn);

	string GetFirstName();									
	string GetLastName();
	string GetTeamName();

	void SetAttempts(int attempts);						//set functions for all relevant stats
	void SetCompletions(int completions);
	void SetCompletionPercentage(double percentage);
	void SetYards(int yards);
	void SetYardsPerAttempt(double YPA);
	void SetTouchdowns(int touchdowns);
	void SetTouchdownPercentage(double TDP);
	void SetInterceptions(int interceptions);
	void SetInterceptionPercentage(double INTP);
	void SetLongestGain(int LongestGain);
	void SetSack(int Sack);
	void SetTackleForLoss(int TFL);
	void SetPasserRating(double PR);

													//set functions for QB's ranking in the respective stats
	void SetAttemptsRank(int attemptsRank);
	void SetCompletionsRank(int completionsRank);
	void SetCompletionPercentageRank(int percentageRank);
	void SetYardsRank(int yardsRank);
	void SetYardsPerAttemptRank(int YPARank);
	void SetTouchdownsRank(int touchdownsRank);
	void SetTouchdownPercentageRank(int TDPRank);
	void SetInterceptionsRank(int interceptionsRank);
	void SetInterceptionPercentageRank(int INTPRank);
	void SetLongestGainRank(int LongestGainRank);
	void SetSackRank(int SackRank);
	void SetTackleForLossRank(int TFLRank);
	void SetPasserRatingRank(int PRRank);

	int GetAttempts();										//Get functions for all relevant stats
	int GetCompletions();
	double GetCompletionPercentage();
	int GetYards();
	double GetYardsPerAttempt();
	int GetTouchdowns();
	double GetTouchdownPercentage();
	int GetInterceptions();
	double GetInterceptionPercentage();
	int GetLongestGain();
	int GetSack();
	int GetTackleForLoss();
	double GetPasserRating();

															//Get functions for QB's ranking in the respective stats
	int GetAttemptsRank();										//Get functions for all relevant stats
	int GetCompletionsRank();
	int GetCompletionPercentageRank();
	int GetYardsRank();
	int GetYardsPerAttemptRank();
	int GetTouchdownsRank();
	int GetTouchdownPercentageRank();
	int GetInterceptionsRank();
	int GetInterceptionPercentageRank();
	int GetLongestGainRank();
	int GetSackRank();
	int GetTackleForLossRank();
	int GetPasserRatingRank();

private:	
	int attempts, completions, yards, touchdowns, interceptions, LongestGain, sack, TFL;
	double percentage, YPA, TDP, INTP, PasserRating;
	string firstname, lastname, teamname;

	int attemptsRank, completionsRank, yardsRank, touchdownsRank, interceptionsRank, LongestGainRank, sackRank, TFLRank, 
		percentageRank, YPARank, TDPRank, INTPRank, PasserRatingRank;
};