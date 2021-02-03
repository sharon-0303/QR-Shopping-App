package com.example.shop;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Contactus extends Activity {
	TextView tv1,tv2,tv3,tv4,tv5;
	Button b1;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_contactus);
		
		tv1=(TextView)findViewById(R.id.textView2);
		tv2=(TextView)findViewById(R.id.textView3);
		tv3=(TextView)findViewById(R.id.textView4);
		tv4=(TextView)findViewById(R.id.textView5);
		tv5=(TextView)findViewById(R.id.textView6);

		b1=(Button)findViewById(R.id.button1);
		tv1.setText("MintFlower");
		tv2.setText("Sulthan Bathery, Sulthan Bathery P.O, Wayanad, 673592");
		tv3.setText("9747438385");
		tv4.setText("Mintflower@gmail.com");
	    tv5.setText("S.Bathery,Wayanad");
		
	}

	

}
