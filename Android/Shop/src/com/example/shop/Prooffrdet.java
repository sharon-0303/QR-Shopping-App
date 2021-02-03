package com.example.shop;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.widget.Button;
import android.widget.TextView;

public class Prooffrdet extends Activity {
	TextView tv1,tv2,tv3,tv4,tv5,tv6;
	Button b1;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_prooffrdet);
		tv1=(TextView)findViewById(R.id.textView2);
		tv2=(TextView)findViewById(R.id.textView3);
		tv3=(TextView)findViewById(R.id.textView13);
		tv4=(TextView)findViewById(R.id.textView4);
		tv5=(TextView)findViewById(R.id.textView7);
		tv6=(TextView)findViewById(R.id.textView9);
		b1=(Button)findViewById(R.id.button1);
		
		tv1.setText(Offers.pname[Offers.pos]);
		tv2.setText(Offers.P_Offer[Offers.pos]);
		tv3.setText(Offers.Sp_Offer[Offers.pos]);
		tv4.setText(Offers.From_Date[Offers.pos]);
		tv5.setText(Offers.End_Date[Offers.pos]);
		tv6.setText(Offers.Total_Price[Offers.pos]);
	}


}
